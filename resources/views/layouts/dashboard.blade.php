<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>CMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="/assets/images/favicon.ico">

    <!-- Sweet Alert css-->
    <link href="/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="/assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="/assets/css/custom.min.css" rel="stylesheet" type="text/css" />

    <!-- Sweet Alerts js -->
    <script src="/assets/libs/sweetalert2/sweetalert2.min.js"></script>

    @stack('styles')
</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('layouts.dashboard.header')

        <!-- removeNotificationModal -->
        @include('layouts.dashboard.removeNotificationModal')
        <!-- ========== App Menu ========== -->
        @include('layouts.dashboard.menu')
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        {{ $slot }}
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="/assets/libs/node-waves/waves.min.js"></script>
    <script src="/assets/libs/feather-icons/feather.min.js"></script>
    <script src="/assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="/assets/js/plugins.js"></script>

    <!-- App js -->
    <script src="/assets/js/app.js"></script>


    <script>
        function successToast(text = "İşlem Başarılı!") {
            Toastify({
                text: text,
                duration: 3000,
                close: true,
                gravity: "top",
                position: 'right',
                backgroundColor: "#4CAF50",
            }).showToast();
        }

        function errorToast(text = "İşlem Başarısız!") {
            Toastify({
                text: text,
                duration: 3000,
                close: true,
                gravity: "top",
                position: 'right',
                backgroundColor: "#FF0000",
            }).showToast();
        }

        function deleteConfirmation(confirmCallback) {
            Swal.fire({
                title: "Silmek istediğinize emin misiniz?",
                text: "Bu işlem geri alınamaz!",
                icon: "warning",
                showCancelButton: !0,
                confirmButtonClass: "btn btn-primary w-xs me-2 mt-2",
                cancelButtonClass: "btn btn-danger w-xs mt-2",
                confirmButtonText: "Evet, sil!",
                buttonsStyling: !1,
                showCloseButton: !0
            }).then(confirmCallback);
        }

        window.addEventListener('success', event => {
            successToast(event.detail[0].message);
            console.log(event.detail);
        });

        window.addEventListener('error', event => {
            errorToast(event.detail[0].message);
            console.log(event);
        });
    </script>

    @stack('scripts')
</body>

</html>