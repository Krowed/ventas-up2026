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
    <title>Dashboard - Mytems</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Kanakku is a Sales, Invoices & Accounts Admin template for Accountant or Companies/Offices with various features for all your needs. Try Demo and Buy Now.">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreams Technologies">
    <link rel="preload" href="fonts/outfit-regular.woff2" as="font" type="font/ttf" crossorigin>
    <style>
        body {
            font-family: 'Outfit', sans-serif !important;
            /* Evita que el texto desaparezca mientras carga */
            visibility: visible !important;
        }
    </style>
    <script src="{{ asset('assets/js/theme-script.js') }}"></script>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/logo/favicon.ico') }}">

    <!-- Apple Touch Icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-touch-icon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- Tabler Icon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/tabler-icons/tabler-icons.min.css') }}">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">


    <!-- Daterangepikcer CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">

    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/waitMe.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

    <!-- Tabler Icon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/tabler-icons/tabler-icons.min.css') }}">

    <!-- Simplebar CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/simplebar/simplebar.min.css') }}">
     <link rel="stylesheet" href="{{ asset('assets/plugins/quill/quill.snow.css') }}">

    <!-- Iconsax CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/iconsax.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style-toast.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style-load.css') }}">



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.min.js"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Datatable JS -->
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}"></script>

    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/waitMe.min.js') }}"></script>
</head>

<body id="layout-content" class="loader-active {{ request()->is('products') ? 'mini-sidebar' : '' }}">
    @include('load')
    <!-- Begin Wrapper -->
    <div class="main-wrapper">

        <!-- Topbar Start -->
        <div class="header">
            <div class="main-header">

                <!-- Logo -->
                <div class="header-left">
                    <a href="{{ url('/') }}" class="logo">
                        <img src="assets/img/logo.svg" alt="Logo">
                    </a>
                    <a href="{{ url('/') }}" class="dark-logo">
                        <img src="assets/img/logo-white.svg" alt="Logo">
                    </a>
                </div>

                <!-- Sidebar Menu Toggle Button -->
                <a id="mobile_btn" class="mobile_btn" href="#sidebar">
                    <span class="bar-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </a>

                <div class="header-user">
                    <div class="nav user-menu nav-list">
                        <div class="me-auto d-flex align-items-center" id="header-search">

                            <!-- Add -->
                            <div class="dropdown me-3">
                                <a class="btn btn-primary bg-gradient btn-xs btn-icon rounded-circle d-flex align-items-center justify-content-center"
                                    data-bs-toggle="dropdown" href="javascript:void(0);" role="button">
                                    <i class="isax isax-add text-white"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-start p-2">
                                    <li>
                                        <a href="add-invoice.html" class="dropdown-item d-flex align-items-center">
                                            <i class="isax isax-document-text-1 me-2"></i>Invoice
                                        </a>
                                    </li>
                                    <li>
                                        <a href="expenses.html" class="dropdown-item d-flex align-items-center">
                                            <i class="isax isax-money-send me-2"></i>Expense
                                        </a>
                                    </li>
                                    <li>
                                        <a href="add-credit-notes.html" class="dropdown-item d-flex align-items-center">
                                            <i class="isax isax-money-add me-2"></i>Credit Notes
                                        </a>
                                    </li>
                                    <li>
                                        <a href="add-debit-notes.html" class="dropdown-item d-flex align-items-center">
                                            <i class="isax isax-money-recive me-2"></i>Debit Notes
                                        </a>
                                    </li>
                                    <li>
                                        <a href="add-purchases-orders.html"
                                            class="dropdown-item d-flex align-items-center">
                                            <i class="isax isax-document me-2"></i>Purchase Order
                                        </a>
                                    </li>
                                    <li>
                                        <a href="add-quotation.html" class="dropdown-item d-flex align-items-center">
                                            <i class="isax isax-document-download me-2"></i>Quotation
                                        </a>
                                    </li>
                                    <li>
                                        <a href="add-delivery-challan.html"
                                            class="dropdown-item d-flex align-items-center">
                                            <i class="isax isax-document-forward me-2"></i>Delivery Challan
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <!-- Breadcrumb -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-divide mb-0">
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('/') }}"><i class="isax isax-home-2 me-1"></i>Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                </ol>
                            </nav>

                        </div>

                        <div class="d-flex align-items-center">

                            <!-- Search -->
                            <div class="input-icon-end position-relative me-2">
                                <input type="text" class="form-control" placeholder="Buscar">
                                <span class="input-icon-addon">
                                    <i class="isax isax-search-normal"></i>
                                </span>
                            </div>
                            <!-- /Search -->

                            <!-- Notification -->
                            <div class="notification_item me-2">
                                <a href="#" class="btn btn-menubar position-relative" id="notification_popup"
                                    data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                    <i class="isax isax-notification-bing5"></i>
                                    <span class="position-absolute badge bg-success border border-white"></span>
                                </a>
                                <div class="dropdown-menu p-0 dropdown-menu-end dropdown-menu-lg"
                                    style="min-height: 300px;">

                                    <div class="p-2 border-bottom">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="m-0 fs-16 fw-semibold"> Notifications</h6>
                                            </div>
                                            <div class="col-auto">
                                                <div class="dropdown">
                                                    <a href="#"
                                                        class="dropdown-toggle drop-arrow-none link-dark"
                                                        data-bs-toggle="dropdown" data-bs-offset="0,15"
                                                        aria-expanded="false">
                                                        <i
                                                            class="isax isax-setting-2 fs-16 text-body align-middle"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <!-- item-->
                                                        <a href="javascript:void(0);" class="dropdown-item"><i
                                                                class="ti ti-bell-check me-1"></i>Mark as Read</a>
                                                        <!-- item-->
                                                        <a href="javascript:void(0);" class="dropdown-item"><i
                                                                class="ti ti-trash me-1"></i>Delete All</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Notification Dropdown -->
                                    <div class="notification-body position-relative z-2 rounded-0" data-simplebar="">

                                        <!-- Item-->
                                        <div class="dropdown-item notification-item py-2 text-wrap border-bottom"
                                            id="notification-1">
                                            <div class="d-flex">
                                                <div class="me-2 position-relative flex-shrink-0">
                                                    <img src="assets/img/profiles/avatar-05.jpg"
                                                        class="avatar-md rounded-circle" alt="User Img">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="mb-0 fw-semibold text-dark">John Smith</p>
                                                    <p class="mb-1 text-wrap fs-14">
                                                        A <span class="fw-semibold">new sale</span> has been recorded.
                                                    </p>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <span class="fs-12"><i class="isax isax-clock me-1"></i>4 min
                                                            ago</span>
                                                        <div
                                                            class="notification-action d-flex align-items-center float-end gap-2">
                                                            <a href="javascript:void(0);"
                                                                class="notification-read rounded-circle bg-info"
                                                                data-bs-toggle="tooltip" title=""
                                                                data-bs-original-title="Make as Read"
                                                                aria-label="Make as Read"></a>
                                                            <button class="btn rounded-circle text-danger p-0"
                                                                data-dismissible="#notification-1">
                                                                <i class="isax isax-close-circle fs-12"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Item-->
                                        <div class="dropdown-item notification-item py-2 text-wrap border-bottom"
                                            id="notification-2">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <div class="avatar-sm me-2">
                                                        <span
                                                            class="avatar-title bg-soft-info text-info fs-18 rounded-circle">
                                                            D
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="mb-0 fw-semibold text-dark">Donoghue Susan</p>
                                                    <p class="mb-0 text-wrap fs-14">
                                                        Switched to a lower-tier package
                                                    </p>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <span class="fs-12"><i class="isax isax-clock me-1"></i>4 min
                                                            ago</span>
                                                        <div
                                                            class="notification-action d-flex align-items-center float-end gap-2">
                                                            <a href="javascript:void(0);"
                                                                class="notification-read rounded-circle bg-info"
                                                                data-bs-toggle="tooltip" title=""
                                                                data-bs-original-title="Make as Read"
                                                                aria-label="Make as Read"></a>
                                                            <button class="btn rounded-circle text-danger p-0"
                                                                data-dismissible="#notification-2">
                                                                <i class="isax isax-close-circle fs-12"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Item-->
                                        <div class="dropdown-item notification-item py-2 text-wrap border-bottom"
                                            id="notification-3">
                                            <div class="d-flex">
                                                <div class="me-2 position-relative flex-shrink-0">
                                                    <img src="assets/img/profiles/avatar-03.jpg"
                                                        class="avatar-md rounded-circle" alt="User Img">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="mb-0 fw-semibold text-dark">Robert Fox </p>
                                                    <p class="mb-1 text-wrap fs-14">
                                                        Completed payment for <span
                                                            class="fw-semibold">#INV00025</span>
                                                    </p>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <span class="fs-12"><i class="isax isax-clock me-1"></i>4 min
                                                            ago</span>
                                                        <div
                                                            class="notification-action d-flex align-items-center float-end gap-2">
                                                            <a href="javascript:void(0);"
                                                                class="notification-read rounded-circle bg-info"
                                                                data-bs-toggle="tooltip" title=""
                                                                data-bs-original-title="Make as Read"
                                                                aria-label="Make as Read"></a>
                                                            <button class="btn rounded-circle text-danger p-0"
                                                                data-dismissible="#notification-3">
                                                                <i class="isax isax-close-circle fs-12"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Item-->
                                        <div class="dropdown-item notification-item py-2 text-wrap border-bottom"
                                            id="notification-4">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <div class="avatar-sm me-2">
                                                        <span
                                                            class="avatar-title bg-soft-warning text-warning fs-18 rounded-circle">
                                                            <i class="isax isax-message"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="mb-0 text-wrap fs-14">You have received <span
                                                            class="fw-semibold">20</span> new messages in the
                                                        conversation</p>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <span class="fs-12"><i class="isax isax-clock me-1"></i>3 min
                                                            ago</span>
                                                        <div
                                                            class="notification-action d-flex align-items-center float-end gap-2">
                                                            <a href="javascript:void(0);"
                                                                class="notification-read rounded-circle bg-info"
                                                                data-bs-toggle="tooltip" title=""
                                                                data-bs-original-title="Make as Read"
                                                                aria-label="Make as Read"></a>
                                                            <button class="btn rounded-circle text-danger p-0"
                                                                data-dismissible="#notification-4">
                                                                <i class="isax isax-close-circle fs-12"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Item-->
                                        <div class="dropdown-item notification-item py-2 text-wrap border-bottom"
                                            id="notification-5">
                                            <div class="d-flex">
                                                <div class="me-2 position-relative flex-shrink-0">
                                                    <img src="assets/img/profiles/avatar-17.jpg"
                                                        class="avatar-md rounded-circle" alt="User Img">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="mb-0 fw-semibold text-dark">Charlotte Brown</p>
                                                    <p class="mb-1 text-wrap fs-14">
                                                        New invoice generated <span class="fw-semibold">
                                                            #INV00028</span>
                                                    </p>
                                                    <div class="mb-1">
                                                        <a class="badge bg-success p-2 py-1 me-1"
                                                            href="#">Approve</a>
                                                        <a class="badge bg-danger p-2 py-1" href="#">Deny</a>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <span class="fs-12"><i class="isax isax-clock me-1"></i>45
                                                            min ago</span>
                                                        <div
                                                            class="notification-action d-flex align-items-center float-end gap-2">
                                                            <a href="javascript:void(0);"
                                                                class="notification-read rounded-circle bg-info"
                                                                data-bs-toggle="tooltip" title=""
                                                                data-bs-original-title="Make as Read"
                                                                aria-label="Make as Read"></a>
                                                            <button class="btn rounded-circle text-danger p-0"
                                                                data-dismissible="#notification-5">
                                                                <i class="isax isax-close-circle fs-12"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- View All-->
                                    <div class="p-2 rounded-bottom border-top text-center">
                                        <a href="notifications.html" class="text-center fw-medium fs-14 mb-0">
                                            View All
                                        </a>
                                    </div>

                                </div>
                            </div>

                            <!-- Light/Dark Mode Button -->
                            <div class="me-2 theme-item">
                                <a href="javascript:void(0);" id="dark-mode-toggle"
                                    class="theme-toggle btn btn-menubar">
                                    <i class="isax isax-moon"></i>
                                </a>
                                <a href="javascript:void(0);" id="light-mode-toggle"
                                    class="theme-toggle btn btn-menubar">
                                    <i class="isax isax-sun-1"></i>
                                </a>
                            </div>

                            <!-- User Dropdown -->
                            <div class="dropdown profile-dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle d-flex align-items-center"
                                    data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                    <span class="avatar online">
                                        <img src="assets/img/profiles/avatar-01.jpg" alt="Img"
                                            class="img-fluid rounded-circle">
                                    </span>
                                </a>
                                <div class="dropdown-menu p-2">
                                    <div class="d-flex align-items-center bg-light rounded-1 p-2 mb-2">
                                        <span class="avatar avatar-lg me-2">
                                            <img src="assets/img/profiles/avatar-01.jpg" alt="img"
                                                class="rounded-circle">
                                        </span>
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-1">Jafna Cremson</h6>
                                            <p class="fs-13">Administrator</p>
                                        </div>
                                    </div>

                                    <!-- Item-->
                                    <a class="dropdown-item d-flex align-items-center" href="account-settings.html">
                                        <i class="isax isax-profile-circle me-2"></i>Profile Settings
                                    </a>

                                    <!-- Item-->
                                    <a class="dropdown-item d-flex align-items-center" href="inventory-report.html">
                                        <i class="isax isax-document-text me-2"></i>Reports
                                    </a>

                                    <!-- Item-->
                                    <div
                                        class="form-check form-switch form-check-reverse d-flex align-items-center justify-content-between dropdown-item mb-0">
                                        <label class="form-check-label" for="notify"><i
                                                class="isax isax-notification me-2"></i>Notifications</label>
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="notify">
                                    </div>

                                    <hr class="dropdown-divider my-2">

                                    <!-- Item-->
                                    <a class="dropdown-item logout d-flex align-items-center"
                                        href="{{ route('login.logout') }}">
                                        <i class="isax isax-logout me-2"></i>Cerrar sesi&oacute;n
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Mobile Menu -->
                <div class="dropdown mobile-user-menu profile-dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle d-flex align-items-center"
                        data-bs-toggle="dropdown" data-bs-auto-close="outside">
                        <span class="avatar avatar-md online">
                            <img src="assets/img/profiles/avatar-01.jpg" alt="Img"
                                class="img-fluid rounded-circle">
                        </span>
                    </a>
                    <div class="dropdown-menu p-2 mt-0">
                        <a class="dropdown-item d-flex align-items-center" href="profile.html">
                            <i class="isax isax-profile-circle me-2"></i>Profile Settings
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="reports.html">
                            <i class="isax isax-document-text me-2"></i>Reports
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="account-settings.html">
                            <i class="isax isax-setting me-2"></i>Settings
                        </a>
                        <a class="dropdown-item logout d-flex align-items-center" href="login.html">
                            <i class="isax isax-logout me-2"></i>Signout
                        </a>
                    </div>
                </div>
                <!-- /Mobile Menu -->

            </div>
        </div>
        <!-- Topbar End -->

        <!-- Sidenav Menu Start -->
        <div class="two-col-sidebar" id="two-col-sidebar">
            <div class="twocol-mini">

                <!-- Add -->
                <div class="dropdown">
                    <a class="btn btn-primary bg-gradient btn-sm btn-icon rounded-circle d-flex align-items-center justify-content-center"
                        data-bs-toggle="dropdown" href="javascript:void(0);" role="button" data-bs-display="static"
                        data-bs-reference="parent">
                        <i class="isax isax-add"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-start">
                        <li>
                            <a href="add-invoice.html" class="dropdown-item d-flex align-items-center">
                                <i class="isax isax-document-text-1 me-2"></i>Invoice
                            </a>
                        </li>
                        <li>
                            <a href="expenses.html" class="dropdown-item d-flex align-items-center">
                                <i class="isax isax-money-send me-2"></i>Expense
                            </a>
                        </li>
                        <li>
                            <a href="add-credit-notes.html" class="dropdown-item d-flex align-items-center">
                                <i class="isax isax-money-add me-2"></i>Credit Notes
                            </a>
                        </li>
                        <li>
                            <a href="add-debit-notes.html" class="dropdown-item d-flex align-items-center">
                                <i class="isax isax-money-recive me-2"></i>Debit Notes
                            </a>
                        </li>
                        <li>
                            <a href="add-purchases-orders.html" class="dropdown-item d-flex align-items-center">
                                <i class="isax isax-document me-2"></i>Purchase Order
                            </a>
                        </li>
                        <li>
                            <a href="add-quotation.html" class="dropdown-item d-flex align-items-center">
                                <i class="isax isax-document-download me-2"></i>Quotation
                            </a>
                        </li>
                        <li>
                            <a href="add-delivery-challan.html" class="dropdown-item d-flex align-items-center">
                                <i class="isax isax-document-forward me-2"></i>Delivery Challan
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- /Add -->

                <ul class="menu-list">
                    <li>
                        <a href="account-settings.html" data-bs-toggle="tooltip" data-bs-placement="right"
                            data-bs-title="Settings"><i class="isax isax-setting-25"></i></a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="right"
                            data-bs-title="Documentation"><i class="isax isax-document-normal4"></i></a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="right"
                            data-bs-title="Changelog"><i class="isax isax-cloud-change5"></i></a>
                    </li>
                    <li>
                        <a href="login.html"><i class="isax isax-login-15"></i></a>
                    </li>
                </ul>
            </div>
            <div class="sidebar" id="sidebar-two">

                <!-- Start Logo
    Acá reemplazar los logos
    -->
                <div class="sidebar-logo">
                    <a href="{{ url('/') }}" class="logo logo-normal">
                        <img src="assets/img/logo.svg" alt="Logo">
                    </a>
                    <a href="{{ url('/') }}" class="logo-small">
                        <img src="assets/img/logo-small.svg" alt="Logo">
                    </a>
                    <a href="{{ url('/') }}" class="dark-logo">
                        <img src="assets/img/logo-white.svg" alt="Logo">
                    </a>
                    <a href="{{ url('/') }}" class="dark-small">
                        <img src="assets/img/logo-small-white.svg" alt="Logo">
                    </a>

                    <!-- Sidebar Hover Menu Toggle Button -->
                    <a id="toggle_btn" href="javascript:void(0);">
                        <i class="isax isax-menu-1"></i>
                    </a>
                </div>
                <!-- End Logo -->

                <!-- Search -->
                <div class="sidebar-search">
                    <div class="input-icon-end position-relative">
                        <input type="text" class="form-control" placeholder="Search">
                        <span class="input-icon-addon">
                            <i class="isax isax-search-normal"></i>
                        </span>
                    </div>
                </div>
                <!-- /Search -->

                <!--- Sidenav Menu -->
                <div class="sidebar-inner" data-simplebar="">
                    <div id="sidebar-menu" class="sidebar-menu">
                        <ul>
                            <li class="menu-title"><span>Principal</span></li>
                            <li>
                                <ul>
                                    <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
                                        <a href="{{ route('dashboard.index') }}">
                                            <i class="isax isax-element-45"></i><span>Dashboard</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="#">
                                        <i class="isax isax-monitor-recorder5"></i><span>Punto de Venta</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="#">
                                            <i class="isax isax-money-tick5"></i><span>Arqueo de Caja</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="menu-title"><span>Operaciones</span></li>
                            <li>
                                <ul>
                                    <li class="submenu">
                                        <a href="javascript:void(0);">
                                            <i class="isax isax-receipt-item5"></i><span>Ventas</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul>
                                            <li><a href="#">Clientes</a></li>
                                            <li><a href="#">Cotizaciones</a></li>
                                            <li><a href="#">Notas de Venta</a></li>
                                            <li><a href="#">Ventas / POS</a></li>
                                            <li><a href="#">Notas de Crédito</a></li>
                                        </ul>
                                    </li>

                                    <li class="submenu">
                                        <a href="javascript:void(0);">
                                            <i class="isax isax-shopping-cart5"></i><span>Compras</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul>
                                            <li><a href="#">Proveedores</a></li>
                                            <li><a href="#">Ordenes de Compra</a></li>
                                            <li><a href="#">Compras</a></li>
                                            <li class="submenu submenu-two">
                                                <a href="javascript:void(0);">Gastos<span class="menu-arrow inside-submenu"></span></a>
                                                <ul>
                                                    <li><a href="#">Tipo de Gasto</a></li>
                                                    <li><a href="#">Egresos</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="submenu">
                                        <a href="javascript:void(0);"
                                        class="{{ request()->is('products*') ? 'active subdrop' : '' }}">
                                            <i class="isax isax-box5"></i><span>Inventario</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul style="{{ request()->is('products*') ? 'display: block;' : '' }}">
                                            <li><a href="{{ route('admin.products') }}"
                                                class="{{ request()->is('products') ? 'active' : '' }}">Productos</a></li>
                                            <li><a href="#">Categorías</a></li>
                                            <li><a href="#">Almacenes</a></li>
                                            <li class="submenu submenu-two">
                                                <a href="javascript:void(0);">Movimientos<span
                                                        class="menu-arrow inside-submenu"></span></a>
                                                <ul>
                                                    <li><a href="#">Ingreso / Salida</a></li>
                                                    <li><a href="#">Transferencias</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="menu-title"><span>Administración</span></li>
                            <li>
                                <ul>
                                    <li class="submenu">
                                        <a href="javascript:void(0);">
                                            <i class="isax isax-chart-35"></i><span>Reportes</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul>
                                            <li><a href="#">Utilidades</a></li>
                                            <li class="submenu submenu-two">
                                                <a href="javascript:void(0);">Kardex<span
                                                        class="menu-arrow inside-submenu"></span></a>
                                                <ul>
                                                    <li><a href="#">Físico</a></li>
                                                    <li><a href="#">Valorado</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Ventas Detallado</a></li>
                                            <li><a href="#">Reporte Gastos</a></li>
                                        </ul>
                                    </li>

                                    <li class="submenu">
                                        <a href="javascript:void(0);"
                                            class="{{ request()->is('business*') ? 'active subdrop' : '' }}">
                                            <i class="isax isax-setting-25"></i><span>Configuración</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul style="{{ request()->is('business*') ? 'display: block;' : '' }}">
                                            <li>
                                                <a href="{{ route('admin.business') }}"
                                                    class="{{ request()->is('business') ? 'active' : '' }}">Empresa</a>
                                            </li>
                                            <li><a href="#">Usuarios</a></li>
                                            <li><a href="#">Roles</a></li>
                                            <li><a href="#">Permisos</a></li>
                                            <li><a href="#">Series</a></li>
                                            <li><a href="#">Cajas</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                        <div class="sidebar-footer">
                            <ul class="menu-list">
                                <li>
                                    <a href="account-settings.html" data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Settings"><i class="isax isax-setting-25"></i></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Documentation"><i class="isax isax-document-normal4"></i></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Changelog"><i class="isax isax-cloud-change5"></i></a>
                                </li>
                                <li>
                                    <a href="login.html" data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Login"><i class="isax isax-login-15"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sidenav Menu End -->

        <!-- ========================
   Start Page Content
  ========================= -->

        <div class="page-wrapper">

            <!-- Start Content -->
            <div class="content">
                @yield('content')
            </div>
            <!-- End Content -->

            <!-- Start Footer -->
            <div class="footer d-sm-flex align-items-center justify-content-between bg-white py-2 px-4 border-top">
                <p class="text-dark mb-0">&copy; {{ date('Y') }} <a href="javascript:void(0);"
                        class="link-primary">Mytems</a>,
                    Todos los derechos reservados</p>
                <p class="text-dark">Version : 1.3.8</p>
            </div>
            <!-- End Footer -->
        </div>

        <!-- ========================
   End Page Content
  ========================= -->

        <!-- Start Add Ledger  -->
        <div id="add_ledger" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add New Ledger</h4>
                        <button type="button" class="btn-close btn-close-modal custom-btn-close"
                            data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-x"></i></button>
                    </div>
                    <form action="index.html">
                        <div class="modal-body pb-1">
                            <div class="mb-3">
                                <label class="form-label">Amount</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Date</label>
                                <div class="input-group position-relative">
                                    <input type="text" class="form-control datetimepicker rounded-end"
                                        placeholder="dd/mm/yyyy">
                                    <span class="input-icon-addon fs-16 text-gray-9">
                                        <i class="isax isax-calendar-2"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Mode</label>
                                <div class="d-flex align-items-center">
                                    <div class="form-check me-3">
                                        <input class="form-check-input" type="radio" name="Radio"
                                            id="Radio-sm-1">
                                        <label class="form-check-label" for="Radio-sm-1">
                                            Credit
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Radio"
                                            id="Radio-sm-2" checked="">
                                        <label class="form-check-label" for="Radio-sm-2">
                                            Debit
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-flex align-items-center justify-content-between gap-1">
                            <button type="button" class="btn btn-outline-white"
                                data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Add Ledger -->
        <div id="wa-toast-container"></div>
    </div>
    <!-- End Wrapper -->

    <!-- jQuery -->


    <!-- Daterangepikcer JS -->
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>

    <!-- Simplebar JS -->
    <script src="{{ asset('assets/plugins/simplebar/simplebar.min.js') }}"></script>

    <!-- Datetimepicker JS -->
    <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>

    <!-- Chart JS -->
    <script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexchart/chart-data.js') }}"></script>
    <script src="{{ asset('assets/plugins/quill/quill.min.js') }}"></script>


    <!-- Custom JS -->
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/functions.js') }}"></script>


    <script src="{{ asset('cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js') }}"
        data-cf-settings="4ade7af6e63d2907d7dc7864-|49" defer=""></script>
    @yield('scripts')
</body>

</html>
