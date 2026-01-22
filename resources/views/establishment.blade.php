<!DOCTYPE html>
<html lang="es">

<head>
    <script>
        (function() {
            const layout = localStorage.getItem('layout') || 'single';
            const color = localStorage.getItem('color') || 'light';

            document.documentElement.setAttribute('data-layout', layout);
            document.documentElement.setAttribute('data-color', color);

            if (color === 'custom' || color === 'dark') {
                document.documentElement.setAttribute('data-bs-theme', 'dark');
            } else {
                document.documentElement.setAttribute('data-bs-theme', 'light');
            }
        })();
    </script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Seleccionar Establecimiento - Mytems</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Mytems EIRL">
    <link rel="preload" href="fonts/outfit-regular.woff2" as="font" type="font/ttf" crossorigin>
    <style>
        body {
            font-family: 'Outfit', sans-serif !important;
            visibility: visible !important;
        }

        /* Lógica de logos idéntica a tu auth */
        .logo-light, .logo-dark {
            max-width: 180px;
            height: auto;
        }
        .logo-dark { display: none !important; }
        [data-bs-theme="dark"] .logo-light { display: none !important; }
        [data-bs-theme="dark"] .logo-dark { display: inline-block !important; }

        /* Estilo de las tarjetas de establecimiento */
        .establishment-card {
            cursor: pointer;
            transition: all 0.25s ease;
            border: 1px solid var(--bs-border-color);
            background-color: var(--bs-body-bg);
            border-radius: 1rem;
        }

        .establishment-card:hover {
            transform: translateY(-5px);
            border-color: var(--bs-primary);
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
        }

        .establishment-card.selected {
            border-color: var(--bs-primary) !important;
            background-color: var(--bs-primary-bg-subtle) !important;
            border-width: 2px !important;
        }

        .icon-box {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background-color: rgba(13, 110, 253, 0.1);
            color: var(--bs-primary);
        }

        .establishment-card.selected .icon-box {
            background-color: var(--bs-primary);
            color: #fff;
        }

        /* Forzado de la sección para que herede el blanco del auth */
        .form-section {
            background-color: var(--bs-body-bg);
        }
    </style>

    <script src="{{ asset('assets/js/theme-script.js') }}"></script>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/logo/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/tabler-icons/tabler-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/iconsax.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>

    <div class="main-wrapper auth-bg">
        <div class="container-fluid p-0">
            <div class="row g-0 vh-100 overflow-hidden justify-content-center align-items-center">

                <div class="col-lg-7 col-xl-6 d-flex flex-column justify-content-center form-section shadow-lg p-4 p-md-5 rounded-4">
                    
                    <div class="text-center mb-5">
                        <h3 class="fw-bold mt-4 text-body">Seleccionar establecimiento</h3>
                        <p class="text-muted">Hola, selecciona la sede para empezar a facturar hoy.</p>
                    </div>

                    <div class="row g-4 justify-content-center">
                        @php
                            $establecimientos = [
                                ['id' => 1, 'nombre' => 'Ventas - Principal', 'desc' => 'Sede central de operaciones', 'dir' => 'Jr Las Palmas 848'],
                                ['id' => 2, 'nombre' => 'Sucursal Norte', 'desc' => 'Punto de venta minorista', 'dir' => 'Av. Aviación 123']
                            ];
                        @endphp

                        @foreach($warehouses as $warehouse)
                        <div class="col-md-6">
                            <div class="card establishment-card shadow-sm p-4 h-100" data-id="{{ $warehouse->id }}">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="icon-box me-3">
                                        <i class="isax isax-shop fs-3"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-0 text-body">{{ $warehouse->descripcion }}</h6>
                                        <small class="text-muted">{{ $warehouse->detalle }}</small>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-muted small mt-auto">
                                    <i class="ti ti-map-pin me-1 text-primary"></i>
                                    {{ $warehouse->direccion }}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="mt-5 d-flex justify-content-between align-items-center pt-4 border-top">
                        <p class="small text-muted mb-0 fw-medium">&copy; {{ date('Y') }} Mytems EIRL</p>
                        <button id="continueBtn" disabled class="btn btn-primary px-5 py-2 fw-bold rounded-pill shadow-sm">
                            Acceder al Panel <i class="ti ti-arrow-right ms-2"></i>
                        </button>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    
    <script>
        $(document).ready(function() {
            $('.establishment-card').click(function() {
                $('.establishment-card').removeClass('selected');
                $(this).addClass('selected');
                $('#continueBtn').prop('disabled', false);
            });

            $('#continueBtn').click(function() {
                const id = $('.establishment-card.selected').data('id');
                alert(id);
            });
        });
    </script>
</body>
</html>