<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.104.2">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Dashboard Template · Bootstrap v5.2</title>

        <link rel="stylesheet" href="{{ asset('admin/assets/fontawesome/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/assets/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/assets/plugins/summernote/summernote-bs5.min.js') }}">
        <link rel="stylesheet" href="{{ asset('admin/assets/plugins/dropzone/min/dropzone.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/assets/css/main.css') }}">

        <!-- Custom styles for this template -->
        <link href="dashboard.css" rel="stylesheet">
    </head>
    <body>
        <header class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap py-1 shadow">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-4 fw-bold" href="{{ route('admin.dashboard') }}">
                <img width="180" height="40" src="{{ asset('front/assets/images/logo-white.webp') }}" alt="logo">
            </a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <input class="form-control form-control-dark w-100 rounded-1 border-0 py-2" type="text" placeholder="Cherchez ici..." aria-label="Search">
            <div class="navbar-nav">
                <div class="nav-item">
                    <a class="btn btn-primary btn-sm border-0 fs-6 rounded-1 text-white mx-2" href="{{ route('admin.logout') }}">Déconnectez</a>
                </div>
            </div>
        </header>

        <div class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    @include('admin.layouts.sidebar')
                </nav>

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    @yield('main')
                    <canvas class="my-4 w-100" id="myChart" width="900" height="10"></canvas>
                </main>
            </div>
        </div>

        <script src="{{ asset('admin/assets/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('admin/assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/summernote/summernote-bs5.min.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/dropzone/min/dropzone.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/main.js') }}"></script>
        <script>

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });

        </script>
        @yield('extraJs')
    </body>
</html>
