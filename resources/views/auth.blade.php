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
    <title>Acceso - Mytems</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistema de Facturación Electrónica para Emprendedores">
    <meta name="author" content="Mytems EIRL">
    <link rel="preload" href="fonts/outfit-regular.woff2" as="font" type="font/ttf" crossorigin>

    <style>
        body {
            font-family: 'Outfit', sans-serif !important;
            visibility: visible !important;
        }

        /* Estilos críticos para los logos según tu JS */
        .logo-light,
        .logo-dark {
            max-width: 180px;
            height: auto;
        }

        .logo-dark {
            display: none !important;
        }

        [data-bs-theme="dark"] .logo-light {
            display: none !important;
        }

        [data-bs-theme="dark"] .logo-dark {
            display: inline-block !important;
        }

        /* Ajustes de diseño profesional */
        .auth-container {
            min-vh-100;
        }

        .form-section {
            background-color: var(--bs-body-bg);
        }

        .visual-section {
            background: linear-gradient(135deg, rgba(13, 110, 253, 0.05) 0%, rgba(13, 110, 253, 0.1) 100%);
            border-left: 1px solid var(--bs-border-color-translucent);
        }

        .input-group-text {
            background: transparent;
        }

        .cursor-pointer {
            cursor: pointer;
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
            <div class="row g-0 vh-100 overflow-hidden">

                <div class="col-lg-5 col-xl-4 d-flex flex-column justify-content-center form-section shadow-lg">
                    <div class="p-4 p-md-5 mx-auto w-100" style="max-width: 440px;">

                        <div class="mb-5 text-center text-lg-center">
                            <img src="{{ asset('assets/logo/logo.png') }}" class="img-fluid logo-light"
                                alt="Logo Mytems" style="max-width: 80%;">
                            <img src="{{ asset('assets/logo/logo2.png') }}" class="img-fluid logo-dark"
                                alt="Logo Mytems" style="max-width: 80%;">
                        </div>

                        <div class="mb-4">
                            <h5 class="fw-bold mb-1">Bienvenido a @php
                                $business = mb_strtolower($nombre_comercial);
                                $business = preg_replace_callback(
                                    '/\b[a-z]+(?:\'[a-z]+)?\b/',
                                    function ($matches) {
                                        return ucwords($matches[0]);
                                    },
                                    $business,
                                );
                            @endphp
                                {{ $business }} &#x1F44B;</h5>
                            <p class="text-muted">Ingresa tus credenciales.</p>
                        </div>

                        <form action="index.html">
                            <div class="mb-3">
                                <label class="form-label fw-semibold small">Correo Electr&oacute;nico</label>
                                <div class="input-group border rounded-2 overflow-hidden">
                                    <span class="input-group-text border-0">
                                        <i class="isax isax-sms-notification"></i>
                                    </span>
                                    <input type="email" class="form-control border-0 ps-1"
                                        placeholder="ventas@mytems.cloud">
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="d-flex justify-content-between align-items-end mb-1">
                                    <label class="form-label fw-semibold small mb-0">Contrase&ntilde;a</label>
                                    <a href="/reset-password.html"
                                        class="small text-primary text-decoration-none fw-medium">¿Olvidaste tu
                                        contrase&ntilde;a?</a>
                                </div>
                                <div class="pass-group input-group border rounded-2 overflow-hidden">
                                    <span class="input-group-text border-0">
                                        <i class="isax isax-lock"></i>
                                    </span>
                                    <input type="password" class="pass-inputs form-control border-0 ps-1"
                                        placeholder="••••••••">
                                    <span class="input-group-text border-0 cursor-pointer">
                                        <i class="isax toggle-password isax-eye-slash"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember_me">
                                    <label class="form-check-label text-muted small" for="remember_me">
                                        Mantener mi sesi&oacute;n iniciada
                                    </label>
                                </div>
                            </div>

                            <div class="mb-4">
                                <button type="submit" class="btn btn-primary w-100 py-2 fw-bold shadow-sm">
                                    Acceder al panel
                                </button>
                            </div>

                            <div class="text-center pt-2 border-top">
                                <p class="small text-muted mb-0">&copy; 2022 - {{ date('Y') }} Mytems EIRL</p>
                                <span class="small text-muted opacity-75">Gesti&oacute;n r&aacute;pida, simple y
                                    segura</span>
                            </div>
                        </form>
                    </div>
                </div>

                <div
                    class="col-lg-7 col-xl-8 d-none d-lg-flex align-items-center justify-content-center visual-section p-5">
                    <div class="text-center" style="max-width: 600px;">
                        <div class="mb-4 d-inline-block p-4 rounded-circle bg-primary bg-opacity-10 text-primary">
                            <i class="ti ti-receipt-tax fs-1"></i>
                        </div>
                        <h1 class="display-6 fw-bold mb-3">Facturaci&oacute;n Electr&oacute;nica sin complicaciones</h1>
                        <p class="lead text-muted mb-5">
                            Olv&iacute;date de las complicaciones con SUNAT. Emite <strong>boletas y facturas al
                                instante</strong> e impulsa el <strong>crecimiento de tu negocio</strong>.
                        </p>

                        <div class="row g-4 text-start">
                            <div class="col-md-6">
                                <div class="d-flex align-items-start">
                                    <div class="me-3 text-primary"><i class="isax isax-security-safe fs-4"></i></div>
                                    <div>
                                        <h6 class="fw-bold mb-1">Seguridad Total</h6>
                                        <p class="small text-muted mb-0" style="text-align: justify;">Almacenamiento
                                            seguro de tus documentos electr&oacute;nicos con respaldo autom&aacute;tico
                                            en la nube.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start">
                                    <div class="me-3 text-primary"><i class="isax isax-cloud-sunny fs-4"></i></div>
                                    <div>
                                        <h6 class="fw-bold mb-1">Disponibilidad 24/7</h6>
                                        <p class="small text-muted mb-0" style="text-align: justify;">Accede a tu
                                            negocio desde cualquier lugar del mundo y en cualquier dispositivo.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
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
            $(".toggle-password").click(function() {
                // Cambia el icono: alterna entre el ojo y el ojo tachado
                $(this).toggleClass("isax-eye-slash isax-eye");

                // Selecciona el input que está en el mismo grupo
                var input = $(this).closest(".pass-group").find(".pass-inputs");

                // Cambia el tipo de input
                if (input.attr("type") === "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });
        });
    </script>
</body>

</html>
