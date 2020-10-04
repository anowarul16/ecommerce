<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PatientBook') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('/') }}admin/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('/') }}admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/') }}admin/dist/css/adminlte.min.css">
      <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('/') }}admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    @yield('style')
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
@include('admin.partial.topbar')
@include('admin.partial.left-sidebar')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->
    @include('admin.partial.right-sidebar')
    @include('admin.partial.footer')

</div>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('/') }}admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{ asset('/') }}admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('/') }}admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/') }}admin/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{ asset('/') }}admin/dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('/') }}admin/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="{{ asset('/') }}admin/plugins/raphael/raphael.min.js"></script>
<script src="{{ asset('/') }}admin/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="{{ asset('/') }}admin/plugins/jquery-mapael/maps/world_countries.min.js"></script>
<!-- ChartJS -->
<script src="{{ asset('/') }}admin/plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="{{ asset('/') }}admin/dist/js/pages/dashboard2.js"></script>
<!-- DataTables -->
<script src="{{ asset('/') }}admin/plugins/datatables/jquery.dataTables.js"></script>
<script src="{{ asset('/') }}admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
@yield('script')
</body>
</html>
