<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title tab') | {{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
        <!-- Font Awesome -->
        <link href="{{ asset('dashboard/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
        <!-- overlayScrollbars -->
        <link href="{{ asset('dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}" rel="stylesheet">
        <!-- Ionicons -->
        {{-- <link href="{{ asset('plugins/ionicons-2.0.1/css/ionicons.min.css') }}" rel="stylesheet"> --}}
        <!-- Sweetalert Css -->
        <link href="{{ asset('dashboard/plugins/sweetalert2/sweetalert2.css') }}" rel="stylesheet">
        <!-- overlayScrollbars -->
        <link href="{{ asset('dashboard/css/adminlte.min.css') }}" rel="stylesheet">
        <!-- DataTables -->
        <link href="{{ asset('dashboard/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
        <link href="{{ asset('dashboard/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet">
        <link href="{{ asset('dashboard/plugins/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
        @stack('css')
        @livewireStyles
    </head>
    <body class="hold-transition sidebar-mini sidebar-collapse layout-fixed">
        <!-- Site wrapper -->
        <div class="wrapper">
            <!-- Navbar -->
            @include('layouts.navbar')
            <!-- /.navbar -->

            <!-- Left Sidebar -->
            @include('layouts.leftsidebar')
            <!-- #END# Left Sidebar -->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper" id="contentpage">
                <!-- Page Loader -->
                <div class="overlay-wrapper">
                    <div class="overlay preloader"><i class="fas fa-3x fa-sync-alt fa-spin"></i>
                        <div class="text-bold pt-2">Loading...
                        </div>
                    </div>
                    {{-- @include('sweetalert::alert') --}}

                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-4">
                                    <h1 class="urlpage">@yield('title page')</h1>
                                </div>
                                <!-- SEARCH FORM -->
                                <div class="col-sm-4">
                                    <form action="admin">
                                        <div class="input-group">
                                            <input type="search" class="form-control" placeholder="Search">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn  btn-default">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-sm-4">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                                        <li class="breadcrumb-item active urlpage">@yield('title tab')</li>
                                    </ol>
                                </div>
                            </div>
                        </div><!-- /.container-fluid -->
                    </section>

                    @yield('content')
                    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
                        <i class="fas fa-chevron-up"></i>
                    </a>
                </div>
                <!-- #END# Page Loader -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Footer -->
            @include('layouts.footer')
            <!-- #END# Footer -->

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->


        <!-- jQuery -->
        <script src="{{ asset('dashboard/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- <script src="{{ asset('dashboard/plugins/popper/popper.min.js') }}"></script> -->
        <!-- DataTables -->
        <script src="{{ asset('dashboard/plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('dashboard/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('dashboard/plugins/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('dashboard/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('dashboard/plugins/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('dashboard/plugins/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('dashboard/plugins/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
        <script src="{{ asset('dashboard/plugins/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
        <script src="{{ asset('dashboard/plugins/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('dashboard/plugins/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('dashboard/plugins/pdfmake/build/pdfmake.min.js') }}"></script>
        <script src="{{ asset('dashboard/plugins/jszip/jszip.min.js') }}"></script>
        <!-- overlayScrollbars -->
        <script src="{{ asset('dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        <script src="{{ asset('dashboard/js/adminlte.min.js') }}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('dashboard/js/demo.js') }}"></script>
        <!-- Content Page-->
        <!-- <script src="{{ asset('dashboard/js/content.js') }}"></script> -->
        <!-- SweetAlert Plugin Js -->
        <script src="{{ asset('dashboard/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
        <!-- Moment -->
        <script src="{{ asset('dashboard/plugins/moment/moment.min.js') }}"></script>
        <!-- Scripts -->
        {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
        {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
        @yield('javascript')
        @stack('scripts')
        @livewireScripts
    </body>
</html>

