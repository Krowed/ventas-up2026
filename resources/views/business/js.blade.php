<script>
    $(document).ready(function() {
    // 1. Inicialización de Select2
    $(".select2_department, .select2_province, .select2_district").select2({
        placeholder: "[SELECCIONE]",
        width: '100%'
    });

    // 2. Carga inicial de datos
    load_ubigeo();

    // --- EVENTOS DE CAMBIO (UBIGEO) ---

    $('select[name="departamento"]').on('change', function() {
        let value = $(this).val();
        if (!value) return;

        $.ajax({
            url: "{{ route('admin.load_provinces') }}",
            method: 'POST',
            data: {
                '_token': "{{ csrf_token() }}",
                codigo: value
            },
            success: function(r) {
                let html_province = '<option value=""></option>';
                $.each(r.provinces, function(index, province) {
                    html_province += `<option value="${province.codigo}">${province.descripcion}</option>`;
                });

                $('#wrapper_province').removeClass('d-none');
                $('select[name="provincia"]').html(html_province).trigger('change.select2');
                // Limpiar distrito al cambiar departamento
                $('select[name="distrito"]').html('<option value=""></option>').trigger('change.select2');
            },
            dataType: 'json'
        });
    });

    $('select[name="provincia"]').on('change', function() {
        let value = $(this).val();
        let codigo_departamento = $('select[name="departamento"]').val();
        if (!value) return;

        $.ajax({
            url: "{{ route('admin.load_districts') }}",
            method: 'POST',
            data: {
                '_token': "{{ csrf_token() }}",
                codigo: value,
                codigo_departamento: codigo_departamento
            },
            success: function(r) {
                let html_district = '<option value=""></option>';
                $.each(r.districts, function(index, district) {
                    html_district += `<option value="${district.codigo}">${district.descripcion}</option>`;
                });

                $('#wrapper_district').removeClass('d-none');
                $('select[name="distrito"]').html(html_district).trigger('change.select2');
            },
            dataType: 'json'
        });
    });

    // --- EVENTOS DE GUARDADO ---
    notify.success("Datos actualizados correctamente");
    // Guardar Información General
    $('body').on('click', '.btn-save-info', function(e) {
        e.preventDefault();
        let form = $('#form-info').serialize();
        
        $.ajax({
            url: "{{ route('admin.save_info_business') }}",
            method: 'POST',
            data: form,
            beforeSend: function() {
                toggleButtons('.btn-save-info', '.text-save-info', '.text-saving-info', true);
            },
            success: function(r) {
                toggleButtons('.btn-save-info', '.text-save-info', '.text-saving-info', false);
                toast_msg(r.msg, r.type);
            },
            error: function() {
                toggleButtons('.btn-save-info', '.text-save-info', '.text-saving-info', false);
                toast_msg('Error al conectar con el servidor', 'error');
            }
        });
    });

    // Guardar Credenciales SUNAT
    $('body').on('click', '.btn-save-user', function(e) {
        e.preventDefault();
        let form = new FormData($('#form_info_user')[0]);

        $.ajax({
            url: "{{ route('admin.save_info_user') }}",
            method: 'POST',
            data: form,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function() {
                toggleButtons('.btn-save-user', '.text-save-user', '.text-saving-user', true);
            },
            success: function(r) {
                toggleButtons('.btn-save-user', '.text-save-user', '.text-saving-user', false);
                toast_msg(r.msg, r.type);
            },
            error: function() {
                toggleButtons('.btn-save-user', '.text-save-user', '.text-saving-user', false);
            }
        });
    });

    // Generar JSON
    $('body').on('click', '.btn-gen-json', function(e) {
        e.preventDefault();
        $.ajax({
            url: "{{ route('admin.gen_json') }}",
            method: "POST",
            data: { '_token': "{{ csrf_token() }}" },
            beforeSend: function() {
                toggleButtons('.btn-gen-json', '.text-gen', '.text-load-gen', true);
            },
            success: function(r) {
                toggleButtons('.btn-gen-json', '.text-gen', '.text-load-gen', false);
                toast_msg(r.msg, r.type);
            },
            error: function() {
                toggleButtons('.btn-gen-json', '.text-gen', '.text-load-gen', false);
            }
        });
    });
});

function load_ubigeo() {
    $.ajax({
        url: "{{ route('admin.load_ubigeo') }}",
        method: 'POST',
        data: { '_token': "{{ csrf_token() }}" },
        success: function(r) {
            console.log("Datos recibidos del servidor:", r);
            let html_department = '<option value=""></option>';
            $.each(r.departments, function(index, department) {
                let selected = (r.department && department.codigo == r.department.codigo) ? 'selected' : '';
                html_department += `<option value="${department.codigo}" ${selected}>${department.descripcion}</option>`;
            });

            $('select[name="departamento"]').html(html_department).trigger('change.select2');
            if (r.ubigeo != null) {
                $('#wrapper_province, #wrapper_district').removeClass('d-none');
                
                let html_province = '';
                $.each(r.provinces, function(i, p) {
                    let sel = (p.codigo == r.province.codigo) ? 'selected' : '';
                    html_province += `<option value="${p.codigo}" ${sel}>${p.descripcion}</option>`;
                });
                $('select[name="provincia"]').html(html_province).trigger('change.select2');

                let html_district = '';
                $.each(r.districts, function(i, d) {
                    let sel = (d.codigo == r.district.codigo) ? 'selected' : '';
                    html_district += `<option value="${d.codigo}" ${sel}>${d.descripcion}</option>`;
                });
                $('select[name="distrito"]').html(html_district).trigger('change.select2');
            }
        },
        dataType: 'json'
    });
}

function toggleButtons(btnClass, textClass, spinnerClass, isLoading) {
    if (isLoading) {
        $(btnClass).prop('disabled', true);
        $(textClass).addClass('d-none');
        $(spinnerClass).removeClass('d-none');
    } else {
        $(btnClass).prop('disabled', false);
        $(textClass).removeClass('d-none');
        $(spinnerClass).addClass('d-none');
    }
}
</script>