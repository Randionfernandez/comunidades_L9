<!doctype html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name') }}</title>
        <meta name="description" content="@yield('meta-description', 'Gestión de comunidades de propietarios')">

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">

        <link rel="stylesheet" href="/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

        @stack('styles')
        <!-- Theme style -->
        <link rel="stylesheet" href="/adminlte/css/adminlte.min.css">

    </head>
    <body class="hold-transition sidebar-mini light-mode">
        <div class="wrapper">

            <!-- Navbar -->
            @include('adminlte._partials.navbar')
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->

            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="/" class="brand-link">
                    <img src="/adminlte/img/AdminLTELogo.png" alt="Comunidades Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <!--                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                                            <div class="image">
                                                <img src="/adminlte/img/user8-128x128.jpg" class="img-circle elevation-2" alt="User Image">
                                            </div>
                                            <div class="info">
                                                <a href="#" class="d-block">{{-- auth()->user()->email --}}</a>
                                            </div>
                                        </div>-->

                    <!-- SidebarSearch Form 
                    @include('adminlte._partials.sidebarSearch')
                    -->

                    <!-- Sidebar Menu -->
                    @if (session('cmd_seleccionada'))  
                    @include('adminlte._partials.sidebarMenu')
                    @endif

                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>


            <!-- Content Wrapper. Contains page content -->
            @include('adminlte._partials.content_wrapper')
            <!-- /.content-wrapper -->

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
                <div class="p-3">
                    <h5>Title</h5>
                    <p>Sidebar content</p>
                </div>
            </aside>
            <!-- /.control-sidebar -->

            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- To the right -->
                <div class="float-right d-none d-sm-inline">
                    Aplicación en fase de desarrollo
                </div>
                <!-- Default to the left -->
                <strong>Copyright &copy; 2022 <a href="https://github.com/randionfernandez/comunidades">Randion</a></strong>
            </footer>
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->

        <!-- jQuery -->
        <script src="/adminlte/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Datatables & plugins  -->
        <script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

        <!-- AdminLTE App -->
        <script src="/adminlte/js/adminlte.min.js"></script>
        <script src="/js/apirest.js"></script>


        @stack('scripts')

    </body>
</html>
