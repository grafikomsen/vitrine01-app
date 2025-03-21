<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="{{ getSettings()->description }}">
        <meta name="keyword" content="{{ getSettings()->keyword }}">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="_token" content="{{ csrf_token() }}">

        <!-- SEO -->
        @if (!empty(getSettings()) && getSettings()->website_title != '')
        <title>{{ getSettings()->website_title }}</title>
        @else
        <title></title>
        @endif
        <meta name="description" content="{{ getSettings()->description }}" />
        <link rel="canonical" href="{{ getSettings()->url_canonique }}" />
        <meta property="og:locale" content="{{ getSettings()->og_locale }}" />
        <meta property="og:type" content="{{ getSettings()->og_type }}" />
        <meta property="og:title" content="{{ getSettings()->website_title }}" />
        <meta property="og:description" content="{{ getSettings()->description }}" />
        <meta property="og:url" content="{{ getSettings()->url_canonique }}" />
        <meta property="og:site_name" content="{{ getSettings()->website_title }}" />
        <meta property="article:modified_time" content="{{ getSettings()->article_modified_time }}" />
        <meta property="og:image" content="http://127.0.0.1:8000/uploads/settings/setting-1737673306-1.jpg" />
        <meta property="og:image:width" content="1024" />
        <meta property="og:image:height" content="1024" />
        <meta property="og:image:type" content="{{ getSettings()->og_image_type }}" />
        <meta name="twitter:card" content="{{ getSettings()->twitter_card }}" />
        <!-- / SEO -->

        <!-- FONTAWSOME -->
        <link  rel="stylesheet" href="{{ asset('front/assets/fontawesome/css/all.css') }}">
        <!-- BOXICONS -->
        <link  rel="stylesheet" href="{{ asset('front/assets/boxicons/css/boxicons.min.css') }}">
        <!-- BOOTSTRAP -->
        <link  rel="stylesheet" href="{{ asset('front/assets/bootstrap/css/bootstrap.min.css') }}">
        <!-- CSS -->
        <link  rel="stylesheet" href="{{ asset('front/assets/css/main.css') }}">
    </head>
    <body>
        <header class="shadow sticky-top">
            <div class="Top-bar">
                <div class="container d-flex flex-wrap">
                    <ul class="nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white px-2">
                                <i class="fa fa-location-dot"></i>
                                <span class="h6">{{ getSettings()->address }}</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="mailto:info@grafikomsen.com" class="nav-link text-white px-2">
                                <i class="fa fa-envelope"></i>
                                <span class="h6">{{ getSettings()->email }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="tel:+221-119-63-63" class="nav-link text-white px-2">
                                <i class="fa fa-phone"></i>
                                <span class="h6">{{ getSettings()->phone }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg bg-light">
                <div class="container">
                    <a class="navbar-brand fs-3 fw-bold" href="{{ route('home') }}">
                        <img src="{{ asset('front/assets/images/logo.webp') }}" width="170" height="40" alt="Nettoyage professionnelle Sénégal">
                    </a>
                    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link fw-bold pe-3 active" aria-current="page" href="{{ route('home') }}">ACCUEIL</a>
                            </li>
                            <!--<li class="nav-item dropdown">
                                <a class="nav-link pe-3 fw-bold dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    SERVICES
                                </a>
                                <ul class="dropdown-menu rounded-0">
                                    <li><a class="dropdown-item" href="#">SEO</a></li>
                                    <li><a class="dropdown-item" href="#">Web dev</a></li>
                                    <li><a class="dropdown-item" href="#">Graphisme</a></li>
                                </ul>
                            </li>-->
                            <li class="nav-item">
                                <a class="nav-link fw-bold pe-3" href="{{ route('services') }}">SERVICES</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bold pe-3" href="{{ route('about') }}">A PROPOS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bold pe-3" href="{{ route('projets') }}">NOS PARTENAIRES</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bold pe-4" href="{{ route('contact') }}">CONTACT</a>
                            </li>
                        </ul>
                        <a href="#" class="btn btn-primary fw-bold rounded-0 border-0 px-3">Demande de devis</a>
                    </div>
                </div>
            </nav>
        </header>
        <main>
            @yield('main')
        </main>
        <!-- ======================= Footer START ======================= -->
        <footer class="bg-primary py-3">
            <div class="container">
                <div class="row pt-5">
                    <div class="col-md-6 px-3 mb-3">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('front/assets/images/logo-white.webp') }}" width="400" alt="">
                        </a>
                        <p class="text-white">À l’ère du numérique, vous avez besoin d’un partenaire qui puisse
                            vous aider à tirer parti des opportunités marketing sur une multitude de canaux en temps réel.
                        </p>
                    </div>

                    <div class="col-6 col-md-2 px-3 mb-3">
                        <h5 class="text-white fw-bolder">Section</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Home</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Features</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Pricing</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">FAQs</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">About</a></li>
                        </ul>
                    </div>

                    <div class="col-6 col-md-2 px-3 mb-3">
                        <h5 class="text-white fw-bolder">Section</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Home</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Features</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Pricing</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">FAQs</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">About</a></li>
                        </ul>
                    </div>

                    <div class="col-6 col-md-2 px-3 mb-3">
                        <h5 class="text-white fw-bolder">Section</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Home</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Features</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Pricing</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">FAQs</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">About</a></li>
                        </ul>
                    </div>
                </div>

                <div class="d-flex flex-column flex-sm-row justify-content-between pt-3 border-top">
                    <p class="text-white">{{ getSettings()->copyright }}</p>
                    <ul class="list-unstyled d-flex social-media">
                        <li class="ms-3">
                            <a class="nav-link text-white" href="{{ getSettings()->twitter }}">
                                <i class="fab fa-twitter text-white"></i>
                            </a>
                        </li>
                        <li class="ms-3">
                            <a class="nav-link text-white" href="{{ getSettings()->instagram  }}">
                                <i class="fab fa-instagram text-white"></i>
                            </a>
                        </li>
                        <li class="ms-3">
                            <a class="nav-link text-white" href="{{ getSettings()->facebook  }}">
                                <i class="fab fa-facebook-f text-white"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
        <!-- ======================= Footer END ======================= -->
        <script src="{{ asset('front/assets/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('front/assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('front/assets/js/main.js') }}"></script>
        <script>

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                }
            });

        </script>
        @yield('frontJs')
    </body>
</html>
