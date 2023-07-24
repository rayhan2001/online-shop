<!doctype html>
<html lang="en" class="minimal-theme">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('admin-asset')}}/images/favicon-32x32.png" type="image/png" />

    <!-- Sweetalert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />


    <!--plugins-->
    <link href="{{asset('admin-asset')}}/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="{{asset('admin-asset')}}/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="{{asset('admin-asset')}}/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <link href="{{asset('admin-asset')}}/plugins/select2/css/select2.min.css" rel="stylesheet" />
    <link href="{{asset('admin-asset')}}/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
    <link href="{{asset('admin-asset')}}/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <!--upload file-->
    <link href="{{asset('admin-asset')}}/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="{{asset('admin-asset')}}/plugins/fancy-file-uploader/fancy_fileupload.css" rel="stylesheet" />
    <link href="{{asset('admin-asset')}}/plugins/Drag-And-Drop/dist/imageuploadify.min.css" rel="stylesheet" />
    <link href="{{asset('admin-asset')}}/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="{{asset('admin-asset')}}/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{asset('admin-asset')}}/css/bootstrap-extended.css" rel="stylesheet" />
    <link href="{{asset('admin-asset')}}/css/style.css" rel="stylesheet" />
    <link href="{{asset('admin-asset')}}/css/icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('admin-asset')}}/npm/bootstrap-icons%401.5.0/font/bootstrap-icons.css">

    <!-- loader-->
    <link href="{{asset('admin-asset')}}/css/pace.min.css" rel="stylesheet" />


    <!--Theme Styles-->
    <link href="{{asset('admin-asset')}}/css/dark-theme.css" rel="stylesheet" />
    <link href="{{asset('admin-asset')}}/css/light-theme.css" rel="stylesheet" />
    <link href="{{asset('admin-asset')}}/css/semi-dark.css" rel="stylesheet" />
    <link href="{{asset('admin-asset')}}/css/header-colors.css" rel="stylesheet" />


    <title>@yield('title')</title>
</head>

<body>


<!--start wrapper-->
<div class="wrapper">
    <!--start top header-->
    @include('admin.elements.top_header')
    <!--end top header-->

    <!--start sidebar -->
    @include('admin.elements.left_sidebar')
    <!--start sidebar -->

    <!--start content-->
    <main class="page-content">
        @yield('content')
    </main>
    <!--end page main-->


    <!--start overlay-->
    @include('admin.elements.right_sidebar')
    <!--end switcher-->

</div>
<!--end wrapper-->

<!-- Toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- Sweetalert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>

<!-- Bootstrap bundle JS -->
<script src="{{asset('admin-asset')}}/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="{{asset('admin-asset')}}/js/jquery.min.js"></script>
<script src="{{asset('admin-asset')}}/plugins/simplebar/js/simplebar.min.js"></script>
<script src="{{asset('admin-asset')}}/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="{{asset('admin-asset')}}/js/pace.min.js"></script>
<script src="{{asset('admin-asset')}}/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="{{asset('admin-asset')}}/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="{{asset('admin-asset')}}/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
<script src="{{asset('admin-asset')}}/plugins/select2/js/select2.min.js"></script>
<script src="{{asset('admin-asset')}}/js/form-select2.js"></script>
<script src="{{asset('admin-asset')}}/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="{{asset('admin-asset')}}/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<script src="{{asset('admin-asset')}}/js/table-datatable.js"></script>
<!--app-->
<script src="{{asset('admin-asset')}}/plugins/fancy-file-uploader/jquery.ui.widget.js"></script>
<script src="{{asset('admin-asset')}}/plugins/fancy-file-uploader/jquery.fileupload.js"></script>
<script src="{{asset('admin-asset')}}/plugins/fancy-file-uploader/jquery.iframe-transport.js"></script>
<script src="{{asset('admin-asset')}}/plugins/fancy-file-uploader/jquery.fancy-fileupload.js"></script>
<script src="{{asset('admin-asset')}}/plugins/Drag-And-Drop/dist/imageuploadify.min.js"></script>
<script src="{{asset('admin-asset')}}/js/form-file-upload.js"></script>
<!--app-->
<script src="{{asset('admin-asset')}}/js/app.js"></script>
<script src="{{asset('admin-asset')}}/js/index.js"></script>

<script>
    new PerfectScrollbar(".best-product")
    new PerfectScrollbar(".top-sellers-list")
</script>


</body>
</html>
