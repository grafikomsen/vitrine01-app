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
        <meta name="google-site-verification" content="{{ getSettings()->url_googleSearchConsole }}" />
        <!-- / SEO -->

        <!-- FONTAWSOME -->
        <link  rel="stylesheet" href="{{ asset('front/assets/fontawesome/css/all.css') }}">
        <!-- BOOTSTRAP -->
        <link  rel="stylesheet" href="{{ asset('front/assets/bootstrap/css/bootstrap.min.css') }}">
        <!-- OWL CAROUSEL -->
        <link rel="stylesheet" href="{{ asset('front/assets/css/owl.carousel.min.css') }}">
        <!-- OWL DEFAULT CAROUSEL -->
        <link rel="stylesheet" href="{{ asset('front/assets/css/owl.theme.default.min.css') }}">
        <!-- CSS -->
        <link  rel="stylesheet" href="{{ asset('front/assets/css/main.css') }}">
    </head>
    <body>
        <header class="sticky-top">
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
            <nav class="navbar navbar-expand-lg bg-white">
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
                                <a class="nav-link fw-bold pe-3 {{ (Session::get('page') == 'home') ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">ACCUEIL</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bold pe-3 {{ (Session::get('page') == 'services') ? 'active' : '' }}" href="{{ route('services') }}">SERVICES</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bold pe-3 {{ (Session::get('page') == 'about') ? 'active' : '' }}" href="{{ route('about') }}">A PROPOS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bold pe-3 {{ (Session::get('page') == 'projet') ? 'active' : '' }}" href="{{ route('projets') }}">PARTENAIRES</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bold pe-3 {{ (Session::get('page') == 'blog') ? 'active' : '' }}" href="{{ route('blogs') }}">BLOGS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bold pe-4 {{ (Session::get('page') == 'contact') ? 'active' : '' }}" href="{{ route('contact') }}">CONTACT</a>
                            </li>
                        </ul>
                        <a href="{{ route('contact') }}" class="btn btn-primary fw-bold rounded-0 border-0 px-3">Demande de devis</a>
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
                            <img src="{{ asset('front/assets/images/logo-white.webp') }}" width="300" alt="">
                        </a>
                        <p class="text-white">
                            Nettoyage Professionnel Sénégal dispose d’entreprises de nettoyage fiables et compétitives, offrant des services adaptés aux besoins locaux (climat, types de salissures, exigences sectorielles). Que ce soit à Mbour, Saly ou Somone, des professionnels garantissent propreté et satisfaction.
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
        <!-- JQUERY -->
        <script src="{{ asset('front/assets/jquery/jquery.min.js') }}"></script>
        <!-- BOOTSTRAP JS -->
        <script src="{{ asset('front/assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- OWL CAROUSEL JS -->
        <script src="{{ asset('front/assets/js/owl.carousel.min.js') }}"></script>
        <!-- MAIN JS -->
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
