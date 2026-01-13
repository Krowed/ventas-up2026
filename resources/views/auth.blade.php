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
    <title>Auth - Mytems</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistema de Facturación Electrónica para Emprendedores">
    <meta name="author" content="Mytems EIRL">
    <link rel="preload" href="fonts/outfit-regular.woff2" as="font" type="font/ttf" crossorigin>
	<style>
		body {
            font-family: 'Outfit', sans-serif !important;
            /* Evita que el texto desaparezca mientras carga */
            visibility: visible !important; 
        }
	</style>
    <script src="assets/js/theme-script.js"></script>
    
    <script src="assets/js/theme-script.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/logo/favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-touch-icon.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/tabler-icons/tabler-icons.min.css">
    <link rel="stylesheet" href="assets/css/iconsax.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="bg-white">

    <div class="main-wrapper auth-bg">
        <div class="container-fuild">
            <div class="w-100 overflow-hidden position-relative flex-wrap d-block vh-100">

                <div class="row justify-content-center align-items-center vh-100 overflow-auto flex-wrap ">
                    
                    <div class="col-lg-5 mx-auto">
                        <form action="index.html" class="d-flex justify-content-center align-items-center">
                            <div class="d-flex flex-column justify-content-lg-center p-4 p-lg-0 pb-0 flex-fill">
                                <div class="mx-auto mb-4 text-center">
                                    <img src="{{ asset('assets/logo/logo2.png') }}" class="img-fluid" alt="Logo Mytems" style="max-width: 200px;">
                                </div>
                                <div class="card border-0 p-lg-3 shadow-lg">
                                    <div class="card-body">
                                        <div class="text-center mb-4">
                                            <h4 class="mb-2 fw-bold">Bienvenido a Mytems EIRL 👋</h4>
                                            <p class="mb-0 text-muted">Sistema de Facturación Electrónica para Emprendedores</p>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label class="form-label">Correo Electrónico</label>
                                            <div class="input-group">
                                                <span class="input-group-text border-end-0">
                                                    <i class="isax isax-sms-notification"></i>
                                                </span>
                                                <input type="email" class="form-control border-start-0 ps-0" placeholder="ventas@gmail.com">
                                            </div>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label class="form-label">Contraseña</label>
                                            <div class="pass-group input-group">
                                                <span class="input-group-text border-end-0">
                                                    <i class="isax isax-lock"></i>
                                                </span>
                                                <span class="isax toggle-password isax-eye-slash"></span>
                                                <input type="password" class="pass-inputs form-control border-start-0 ps-0" placeholder="Escribe tu contraseña">
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between mb-4">
                                            <div class="d-flex align-items-center">
                                                <div class="form-check form-check-md mb-0">
                                                    <input class="form-check-input" id="remember_me" type="checkbox">
                                                    <label for="remember_me" class="form-check-label mt-0 text-muted">Mantener sesión iniciada</label>
                                                </div>
                                            </div>
                                            <div class="text-end">
                                                <a href="/reset-password.html" class="text-primary-mytems fw-medium">¿Olvidaste tu contraseña?</a>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary text-white w-100 shadow-sm py-2">Acceder</button>
                                        </div>

                                        <div class="login-or">
                                            <span class="span-or">Gestión rápida, simple y segura</span>
                                        </div>

                                        <div class="text-center">
                                            <h6 class="fw-normal fs-14 mb-0">¿Aún no tienes una cuenta?
                                                <a href="register.html" class="text-primary-mytems fw-bold"> Regístrate</a>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="assets/js/jquery-3.7.1.min.js" type="33c8e355801c2f792795f165-text/javascript"></script>
    <script src="assets/js/bootstrap.bundle.min.js" type="33c8e355801c2f792795f165-text/javascript"></script>
    <script src="assets/js/script.js" type="33c8e355801c2f792795f165-text/javascript"></script>
    <script src="/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="33c8e355801c2f792795f165-|49" defer></script>
</body>

</html>