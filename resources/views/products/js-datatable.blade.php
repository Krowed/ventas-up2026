<script>
    function load_datatable() {
        return $('#table').DataTable({
            serverSide: true,
            paging: true,
            searching: true,
            destroy: true,
            responsive: false,
            ordering: false, 
            autoWidth: false,
            scrollX: false,
            scrollCollapse: false,
            bFilter: true,
            sDom: 'fBtlpi', 
            lengthMenu: [
                [15, 30, 50, -1],
                [15, 30, 50, "Todos"]
            ],
            language: {
                "decimal": "",
                "emptyTable": "No hay información disponible",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ productos", // Cambiado 'items' por 'productos'
                "infoEmpty": "Mostrando 0 a 0 de 0 productos",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ por página", // Traducido 'Row Per Page'
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "",
                "searchPlaceholder": "Buscar...", // Traducido 'Search'
                "zeroRecords": "No se encontraron resultados",
                paginate: {
                    next: '<i class="isax isax-arrow-right-1"></i>',
                    previous: '<i class="isax isax-arrow-left"></i> '
                }
            },
            ajax: "{{ route('admin.get_products') }}",
            columns: [
                { data: 'codigo_interno', name: 'products.codigo_interno', className: 'text-center' },
                { data: 'descripcion', name: 'products.descripcion' }, 
                { data: 'codigo_unidad', name: 'units.codigo', className: 'text-center' },
                { data: 'categoria', name: 'categories.descripcion', className: 'text-center' },
                { data: 'marca', name: 'brands.descripcion', className: 'text-center' },
                { data: 'acciones', name: 'acciones', orderable: false, searchable: false, className: 'text-center' }
            ],
            initComplete: function(settings, json) {
                $('.dataTables_filter').appendTo('#tableSearch');
                $('.dataTables_filter').appendTo('.search-input');
            },
            drawCallback: function() {
                $('.dataTables_paginate ul.pagination').addClass("pagination-sm");
            }
        });
    }

    $(document).ready(function() {
        load_datatable();
    });
</script>