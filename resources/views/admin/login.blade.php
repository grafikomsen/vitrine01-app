<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.104.2">
        <title>Signin Template · Bootstrap v5.2</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
        <!-- Custom styles for this template -->
        <link rel="stylesheet" href="{{ asset('admin/assets/fontawesome/css/all.min.css') }}">
        <!-- Custom styles for this template -->
        <link rel="stylesheet" href="{{ asset('admin/assets/bootstrap/css/bootstrap.min.css') }}">
        <!-- Custom styles for this template -->
        <link rel="stylesheet" href="{{ asset('admin/assets/css/signin.css') }}">
    </head>
    <body class="text-center">
        <main class="m-auto w-25 p-5 card rounded-0">
            @if (Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ Session::get('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="{{ route('admin.authenticate') }}" method="POST">
                @csrf
                <a href="{{ route('home') }}">
                    <img class="mb-2" src="{{ asset('front/assets/images/logo.webp') }}" alt="logo" width="190" height="40">
                </a>
                <h1 class="h5 mb-3 fw-bolder">Se connecter au Panel</h1>

                <div class="input-group mb-3">
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control rounded-0  @error('email') is-invalid @enderror" placeholder="info@exemple.com" >
                    <span class="input-group-text rounded-0">
                        <i class="fa fa-envelope"></i>
                    </span>
                    @error('email')
                        <p class="invalid-feedback text-start">{{ $message }}</p>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control rounded-0  @error('password') is-invalid @enderror" placeholder="********" >
                    <span class="input-group-text rounded-0">
                        <i class="fa fa-lock"></i>
                    </span>
                    @error('password')
                        <p class="invalid-feedback text-start">{{ $message }}</p>
                    @enderror
                </div>

                <div class="checkbox mb-2 text-start">
                    <label>
                        <input type="checkbox" value="remember-me"> Se souvenir de
                    </label>
                </div>
                <button class="w-100 btn btn-primary rounded-0" type="submit">Se connecter</button>
                <p class="mt-2 mb-0 fw-semibold">&copy; GRAFIKOM SEN 2017–2025</p>
            </form>
        </main>
        <script src="{{ asset('admin/assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    </body>
</html>

