@extends('layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
                    <h5 class="card-title mb-0">Listado de Productos</h5>
                    
                    <div class="dt-buttons d-inline-flex gap-2">
                        <button class="btn btn-success waves-effect waves-light btn-create-product d-flex align-items-center" tabindex="0">
                            <i class="isax isax-add-circle me-md-1"></i>
                            <span class="d-none d-sm-inline-block">Agregar producto</span>
                        </button>

                        <button class="btn btn-info waves-effect waves-light btn-upload d-flex align-items-center" tabindex="0">
                            <i class="isax isax-import me-md-1"></i>
                            <span class="d-none d-sm-inline-block">Cargar Excel</span>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table" class="table table-stripped table-center table-nowrap mb-0 datatable">
                            <thead class="table-secondary">
                                <tr>
                                    <th scope="col" width="10%" class="text-center">Código Interno</th>
                                    <th scope="col">Producto</th>
                                    <th scope="col" width="10%" class="text-center">Und.</th>
                                    <th scope="col" width="15%" class="text-center">Categor&iacute;a</th>
                                    <th scope="col" width="15%" class="text-center">Marca</th>
                                    <th scope="col" width="12%" class="text-center">Acciones</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- @include('products.modal-register')
    @include('products.modals') --}}
@endsection

@section('scripts')
    @include('products.js-datatable')
    @include('products.js-register')
@endsection