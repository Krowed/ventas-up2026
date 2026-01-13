<!DOCTYPE html>
<html lang="es">

<head>
    <script>
(function() {
    const layout = localStorage.getItem('layout') || 'single';
    const color = localStorage.getItem('color') || 'light'; 
    
    document.documentElement.setAttribute('data-layout', layout);
    document.documentElement.setAttribute('data-color', color);

    // Activamos el tema de Bootstrap
    if (color === 'custom' || color === 'dark') {
        document.documentElement.setAttribute('data-bs-theme', 'dark');
    } else {
        document.documentElement.setAttribute('data-bs-theme', 'light');
    }
    // NOTA: No forzamos backgroundColor aquí para que el CSS arriba funcione.
})();
</script>
	<!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Auth - Mytems</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Kanakku is a Sales, Invoices & Accounts Admin template for Accountant or Companies/Offices with various features for all your needs. Try Demo and Buy Now.">
	<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
	<meta name="author" content="Dreams Technologies">
    <link rel="preload" href="fonts/outfit-regular.woff2" as="font" type="font/ttf" crossorigin>
	<style>
		body {
            font-family: 'Outfit', sans-serif !important;
            /* Evita que el texto desaparezca mientras carga */
            visibility: visible !important; 
        }
	</style>
    <script src="assets/js/theme-script.js"></script>
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

	<!-- Apple Touch Icon -->
	<link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-touch-icon.png">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<!-- Tabler Icon CSS -->
	<link rel="stylesheet" href="assets/plugins/tabler-icons/tabler-icons.min.css">

	<!-- Iconsax CSS -->
	<link rel="stylesheet" href="assets/css/iconsax.css">

	<!-- Main CSS -->
	<link rel="stylesheet" href="assets/css/style.css">

</head>

<body class="bg-white">

	<!-- Begin Wrapper -->
	<div class="main-wrapper auth-bg">

		<!-- Start Content -->
		<div class="container-fuild">
			<div class="w-100 overflow-hidden position-relative flex-wrap d-block vh-100">

				<!-- start row -->
				<div class="row justify-content-center align-items-center vh-100 overflow-auto flex-wrap ">
					<div class="col-lg-4 mx-auto">
						<form action="index.html" class="d-flex justify-content-center align-items-center">
							<div class="d-flex flex-column justify-content-lg-center p-4 p-lg-0 pb-0 flex-fill">
								<div class=" mx-auto mb-5 text-center">
									<img src="assets/img/logo.svg" class="img-fluid" alt="Logo">
								</div>
								<div class="card border-0 p-lg-3 shadow-lg">
									<div class="card-body">
										<div class="text-center mb-3">
											<h5 class="mb-2">Sign In</h5>
											<p class="mb-0">Please enter below details to access the dashboard</p>
										</div>
										<div class="mb-3">
											<label class="form-label">Email Address</label>
											<div class="input-group">
												<span class="input-group-text border-end-0">
													<i class="isax isax-sms-notification"></i>
												</span>
												<input type="text" value="" class="form-control border-start-0 ps-0" placeholder="Enter Email Address">
											</div>
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<div class="pass-group input-group">
												<span class="input-group-text border-end-0">
													<i class="isax isax-lock"></i>
												</span>
												<span class="isax toggle-password isax-eye-slash"></span>
												<input type="password" class="pass-inputs form-control border-start-0 ps-0" placeholder="****************">
											</div>
										</div>
										<div class="d-flex align-items-center justify-content-between mb-3">
											<div class="d-flex align-items-center">
												<div class="form-check form-check-md mb-0">
													<input class="form-check-input" id="remember_me" type="checkbox">
													<label for="remember_me" class="form-check-label mt-0">Remember Me</label>
												</div>
											</div>
											<div class="text-end">
												<a href="forgot-password.html">Forgot Password</a>
											</div>
										</div>
										<div class="mb-1">
											<button type="submit" class="btn bg-primary-gradient text-white w-100">Sign In</button>
										</div>
										<div class="login-or">
											<span class="span-or">Or</span>
										</div>
										<div class="mb-3">
											<div class="d-flex align-items-center justify-content-center flex-wrap">
												<div class="text-center me-2 flex-fill">
													<a href="javascript:void(0);"
														class="br-10 p-1 btn btn-light d-flex align-items-center justify-content-center">
														<img class="img-fluid m-1" src="assets/img/icons/facebook-logo.svg" alt="Facebook">
													</a>
												</div>
												<div class="text-center me-2 flex-fill">
													<a href="javascript:void(0);"
														class="br-10 p-1 btn btn-light d-flex align-items-center justify-content-center">
														<img class="img-fluid m-1" src="assets/img/icons/google-logo.svg" alt="Google">
													</a>
												</div>
											</div>
										</div>
										<div class="text-center">
											<h6 class="fw-normal fs-14 text-dark mb-0">Don’t have an account yet?
												<a href="register.html" class="hover-a"> Register</a>
											</h6>
										</div>
									</div><!-- end card body -->
								</div><!-- end card -->
							</div>
						</form>
					</div><!-- end col -->
				</div>
				<!-- end row -->

			</div>
		</div>
		<!-- End Content -->

	</div>
	<!-- End Wrapper -->

	<!-- jQuery -->
	<script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>

	<!-- Bootstrap Core JS -->
	<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

	<!-- Custom JS -->
	<script src="{{ asset('assets/js/script.js') }}"></script>

<script src="/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="ba8d912538c0a2d33ccb0ea4-|49" defer></script></body>

</html>