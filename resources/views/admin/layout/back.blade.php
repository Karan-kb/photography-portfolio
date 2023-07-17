<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Keshab Pandey</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{url('back/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{url('back/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body class="sidebar-toggled">
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="{{url('back/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
{{-- @include('admin.includes.header') --}}
<div id="wrapper">
    <!-- Sidebar -->
    @include('admin.includes.sidebar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            @include('admin.includes.nav')

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Page Heading -->
                @yield('content')
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->

@include('admin.includes.footer')

<script src="{{url('back/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{url('back/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{url('back/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{url('back/js/sb-admin-2.min.js')}}"></script>

<!-- Page level plugins -->
<script src="{{url('back/vendor/chart.js/Chart.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{url('back/js/demo/chart-area-demo.js')}}"></script>
<script src="{{url('back/js/demo/chart-pie-demo.js')}}"></script>

<!-- Initialize Bootstrap dropdown -->
<script>
    $(document).ready(function() {
        $('.dropdown-toggle').dropdown();
    });
</script>
</body>
</html>
