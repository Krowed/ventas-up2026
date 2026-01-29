<script>
    let btnCreateProduct = document.querySelector('.btn-create-product');

    btnCreateProduct.addEventListener('click', function() {
        $('#modalAddNewProduct').modal("show");
    });



    const inputImage             = document.getElementById('product_image');
    const previewImg             = document.getElementById('preview-img');
    const placeholderIconImage   = document.getElementById('placeholder-icon');
    const btnRemoveImage         = document.getElementById('btn-remove-image');

    inputImage.addEventListener('change', function() {
        const file = this.files[0];
        const maxSize = 2 * 1024 * 1024; // 2MB

        if (file) {
            if (file.size > maxSize) {
                notify.warning("El archivo es demasiado grande. Máximo 2MB.");
                this.value = "";
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                previewImg.classList.remove('d-none');
                placeholderIconImage.classList.add('d-none');
                btnRemoveImage.classList.remove('d-none');
            }
            reader.readAsDataURL(file);
        }
    });

    btnRemoveImage.addEventListener('click', function() {
        inputImage.value    = ""; 
        previewImg.src      = "";
        previewImg.classList.add('d-none');
        placeholderIconImage.classList.remove('d-none');
        btnRemoveImage.classList.add('d-none');
    });
</script>