@extends('layout')

@section('content')
    <div class="row mb-4 print:hidden">
        <div class="col-12 d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 text-lg fw-bold">Configuración de la cuenta</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0 text-sm">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Mytems</a></li>
                    <li class="breadcrumb-item active">Configuración</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm border-0 mb-0" style="border-bottom-left-radius: 0; border-bottom-right-radius: 0;">
                <div class="card-body p-4 pb-0">
                    <div class="row align-items-center mb-4">
                        <div class="col-auto">
                            <img src="{{ asset('assets/logo/logo_pdf.png') }}" alt="Profile"
                                class="rounded border p-1" style="width: 85px; height: 85px; object-fit: contain;">
                        </div>
                        <div class="col ms-2">
                            <h5 class="fw-bold mb-1 d-flex align-items-center gap-2">
                                {{ $business->razon_social }}
                                <i class="isax isax-verify5 text-info fs-18"></i>
                            </h5>
                            <div class="d-flex flex-wrap gap-3 mb-2">
                                <span class="text-muted fs-13">
                                    <i class="isax isax-user-tick me-1"></i> RUC: {{ $business->ruc }}
                                </span>
                                <span class="text-muted fs-13">
                                    <i class="isax isax-location me-1"></i> {{ $business->direccion }}
                                </span>
                            </div>
                            <p class="text-muted fs-13 mb-0"
                                style="max-width: 800px; line-height: 1.5; text-align: justify;">
                                <strong>Mytems</strong> es una plataforma tecnológica enfocada en simplificar la gestión de
                                negocios. Desarrollamos sistemas modernos de facturación, ventas y control administrativo.
                            </p>
                        </div>
                        <div class="col-md-auto mt-3 mt-md-0">
                            <button type="button" class="btn btn-secondary btn-sm btn-gen-json">
                                <i class="isax isax-export-3 me-1"></i>
                                <span class="text-gen">Generar Json</span>
                                <span class="spinner-border spinner-border-sm d-none text-load-gen"></span>
                            </button>
                        </div>
                    </div>

                    <ul class="nav nav-tabs nav-bordered mb-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#personal" role="tab">
                                <span class="d-md-inline-block">Datos de la Empresa</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#sunat_tab" role="tab">
                                <span class="d-md-inline-block">Usuario SUNAT</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="tab-content">
                <div class="tab-pane show active" id="personal" role="tabpanel">
                    <div class="card border-0 shadow-sm" style="border-top-left-radius: 0; border-top-right-radius: 0;">
                        <div class="card-header bg-transparent border-bottom">
                            <h6 class="card-title mb-0 fw-bold">Información General</h6>
                        </div>
                        <div class="card-body p-4">
                            <form id="form-info">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-medium text-sm">RUC</label>
                                        <input type="text" name="ruc" class="form-control"
                                            value="{{ $business->ruc }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-medium text-sm">Teléfono de Contacto</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light-subtle"><i class="isax isax-call text-muted"></i></span>
                                            <input type="text" name="telefono" class="form-control" placeholder="Ej. +51 999 999 999" value="{{ $business->telefono }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label fw-medium text-sm">Razón Social</label>
                                        <input type="text" name="razon_social" class="form-control text-uppercase"
                                            value="{{ $business->razon_social }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-medium text-sm">Dirección</label>
                                        <input type="text" name="direccion" class="form-control text-uppercase"
                                            value="{{ $business->direccion }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-medium text-sm">País</label>
                                        <select name="pais" class="form-select" disabled>
                                            <option value="PE">Perú</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-medium text-sm">Departamento</label>
                                        <select name="departamento" class="form-control select2_department"></select>
                                    </div>
                                    <div id="wrapper_province" class="col-md-4 d-none">
                                        <label class="form-label fw-medium text-sm">Provincia</label>
                                        <select name="provincia" class="form-control select2_province"></select>
                                    </div>
                                    <div id="wrapper_district" class="col-md-4 d-none">
                                        <label class="form-label fw-medium text-sm">Distrito</label>
                                        <select name="distrito" class="form-control select2_district"></select>
                                    </div>
                                    <div class="col-md-8">
                                        <label class="form-label fw-medium text-sm">URL Api</label>
                                        <input type="text" name="url_api" class="form-control"
                                            value="{{ $business->url_api }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-medium text-sm">URL Api</label>
                                        <input type="text" name="instancia_wpp" class="form-control"
                                            value="{{ $business->instancia_wpp }}">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-4">
                                    <button type="button" class="btn btn-primary px-4 btn-save-info">
                                        <span class="text-save-info">Guardar cambios</span>
                                        <span class="spinner-border spinner-border-sm d-none text-saving-info"></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="sunat_tab" role="tabpanel">
                    <div class="card border-0 shadow-sm" style="border-top-left-radius: 0; border-top-right-radius: 0;">
                        <div class="card-header bg-transparent border-bottom">
                            <h6 class="card-title mb-0 fw-bold">Credenciales SUNAT</h6>
                        </div>
                        <div class="card-body p-4">
                            <form id="form_info_user" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <label class="form-label fw-medium text-sm">Nombre Comercial</label>
                                        <input type="text" name="nombre_comercial" class="form-control"
                                            value="{{ $business->nombre_comercial }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-medium text-sm">Usuario Secundario (SOL)</label>
                                        <input type="text" name="usuario_sunat" class="form-control"
                                            value="{{ $business->usuario_sunat }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-medium text-sm">Clave SOL</label>
                                        <input type="text" name="clave_sunat" class="form-control"
                                            value="{{ $business->clave_sunat }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-medium text-sm">Clave Certificado</label>
                                        <input type="text" name="clave_certificado" class="form-control"
                                            value="{{ $business->clave_certificado }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-sm">Certificado Digital (.pfx)</label>
                                        <div class="input-group">
                                            <label class="input-group-text bg-light-subtle" for="certificado">
                                                <i class="isax isax-document-upload text-primary"></i>
                                            </label>
                                            <input type="file" name="certificado" class="form-control"
                                                id="certificado">
                                        </div>
                                        <small class="text-muted" style="font-size: 11px;">
                                            <i class="isax isax-info-circle me-1"></i> Seleccione el archivo de su firma
                                            electrónica.
                                        </small>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-sm d-block mb-2">Entorno del Servidor
                                            SUNAT</label>
                                        <div class="btn-group w-100" role="group" aria-label="Selección de servidor">
                                            <input type="radio" class="btn-check" name="servidor_sunat" id="beta"
                                                value="3" {{ $business->servidor_sunat == 3 ? 'checked' : '' }}
                                                autocomplete="off">
                                            <label
                                                class="btn btn-outline-info d-flex align-items-center justify-content-center gap-2 py-2"
                                                for="beta">
                                                <i class="isax isax-status-up fs-16"></i>
                                                <span class="fw-semibold">Beta</span>
                                            </label>

                                            <input type="radio" class="btn-check" name="servidor_sunat" id="prod"
                                                value="1" {{ $business->servidor_sunat == 1 ? 'checked' : '' }}
                                                autocomplete="off">
                                            <label
                                                class="btn btn-outline-info d-flex align-items-center justify-content-center gap-2 py-2"
                                                for="prod">
                                                <i class="isax isax-verify fs-16"></i>
                                                <span class="fw-semibold">Producción</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-4">
                                    <button type="button" class="btn btn-primary px-4 btn-save-user">
                                        <span class="text-save-user">Actualizar Credenciales</span>
                                        <span class="spinner-border spinner-border-sm d-none text-saving-user"></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('business.js')
@endsection
