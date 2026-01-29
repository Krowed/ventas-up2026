<div class="modal fade" id="modalAddNewProduct" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel text-white">
                    <i class="isax isax-box-add me-2"></i>Registrar Nuevo Producto
                </h5>
                <button type="button" class="btn-close btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form id="formAddNewProduct" autocomplete="off">
                    <div class="mb-4 text-center text-sm-start">
                        <label class="text-gray-9 fw-bold mb-3 d-block">Imagen del Producto <span class="text-muted fw-normal fs-12">(Opcional)</span></label>
                        <div class="d-flex align-items-center flex-column flex-sm-row">
                            <div class="position-relative me-sm-3 mb-3 mb-sm-0">
                                <div id="image-preview-container"
                                    class="avatar avatar-xxl border border-dashed bg-light d-flex align-items-center justify-content-center"
                                    style="width: 100px; height: 100px; border-radius: 10px; overflow: hidden;">
                                    <i id="placeholder-icon" class="isax isax-image text-primary fs-2"></i>
                                    <img id="preview-img" src="" alt="Vista previa"
                                        class="d-none w-100 h-100 object-fit-cover">
                                </div>

                                <button type="button" id="btn-remove-image"
                                    class="btn btn-danger btn-sm position-absolute top-0 end-0 translate-middle d-none d-flex align-items-center justify-content-center shadow-sm"
                                    style="border-radius: 50%; width: 18px; height: 18px; padding: 0; z-index: 10;">
                                    <i class="isax isax-close-circle fs-5"></i>
                                </button>
                            </div>

                            <div class="d-inline-flex flex-column align-items-center align-items-sm-start">
                                <div class="drag-upload-btn btn btn-sm btn-primary position-relative mb-2">
                                    <i class="isax isax-import me-1"></i>Subir Imagen
                                    <input type="file"
                                        class="form-control opacity-0 position-absolute start-0 top-0 w-100 h-100 cursor-pointer"
                                        id="product_image" accept="image/jpeg, image/png">
                                </div>
                                <small class="text-muted fs-12">JPG o PNG. M&aacute;x 2MB.</small>
                                <small class="text-primary fw-medium fs-11">Recomendado: 450 x 450 px</small>
                            </div>
                        </div>
                    </div>

                    <hr class="text-light">

                    <div class="mb-4">
                        <label class="form-label fw-bold">Tipo de &Iacute;tem <span class="text-danger">*</span></label>
                        <div class="d-flex align-items-center">
                            <div class="form-check me-4">
                                <input class="form-check-input" type="radio" name="itemType" id="typeProduct" checked>
                                <label class="form-check-label" for="typeProduct">Producto</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="itemType" id="typeService">
                                <label class="form-check-label" for="typeService">Servicio</label>
                            </div>
                        </div>
                    </div>

                    <div class="row gx-3">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Nombre del Producto <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Ej: Laptop Gamer Nitro 5">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">C&oacute;digo Interno <span class="text-muted fw-normal fs-12">(Opcional)</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Cód. Referencia">
                                    <button class="btn btn-dark" type="button">Generar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row gx-3">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Categoría <span class="text-danger">*</span></label>
                                <select class="form-select select2-modal">
                                    <option selected disabled>Seleccionar...</option>
                                    <option>Smartphones</option>
                                    <option>Laptops</option>
                                    <option>Accesorios</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Código de Barras</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="isax isax-barcode"></i></span>
                                    <input type="text" class="form-control" placeholder="EAN-13, UPC...">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row gx-3">
                        <div class="col-lg-4 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Precio Compra <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text">S/</span>
                                    <input type="number" step="0.01" class="form-control" value="0.00">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Precio Venta <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text">S/</span>
                                    <input type="number" step="0.01" class="form-control" value="0.00">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Stock Inicial <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" placeholder="0">
                            </div>
                        </div>
                    </div>

                    <div class="row gx-3">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Unidad de Medida</label>
                                <select class="form-select select2-modal">
                                    <option>Pieza (pc)</option>
                                    <option>Kilogramos (Kg)</option>
                                    <option>Litro (l)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Tipo Descuento</label>
                                <select class="form-select">
                                    <option>Ninguno</option>
                                    <option>Porcentaje (%)</option>
                                    <option>Fijo ($)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Alerta Stock Mínimo</label>
                                <input type="number" class="form-control" placeholder="5">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary px-4"
                    data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" form="formAddNewProduct" class="btn btn-primary px-4">
                    Guardar Producto
                </button>
            </div>
        </div>
    </div>
</div>
