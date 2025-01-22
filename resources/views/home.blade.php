@extends('layouts.app')
@section('main')

    <section class="hero">
        <div class="bd-example-snippet bd-code-snippet">
            <div class="bd-example">
                @if ($banners->isNotEmpty())
                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        </div>
                        @foreach ($banners as $key => $banner)
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="520" src="{{ asset('uploads/banners/'.$banner->image) }}" role="img" preserveAspectRatio="xMidYMid slice" focusable="false"/>

                                    <div class="carousel-caption d-none d-md-block">
                                        <h5 class="fs-1 fw-bold text-white">{{ $banner->name }}</h5>
                                        <p class="text-white">{{ $banner->content }}</p>
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </section>

    <section class="about bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 mb-3">
                    <h2 class="fs-1 text-uppercase py-2">{{ $pages->name }}</h2>
                    <p>{{ $pages->content }}</p>
                    <a href="{{ $pages->url }}" class="btn btn-primary fw-bold rounded-1 border-0 px-3">NOS SERVICES <i class="ps-2 fa-solid fa-angle-right"></i></a>
                </div>
                <div class="col-12 col-md-6 col-lg-6 mb-3">
                    <img src="{{ asset('uploads/pages/'.$pages->image) }}" class="img-thumbnail border-0 shadow-sm py-2" alt="{{ $pages->name }}">
                </div>
            </div>
        </div>
    </section>

    <section class="services py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <h2 class="text-center fs-1 pb-2">NOS <span>DOMAINES</span> DE COMPÉTENCES</h2>
                    <p class="text-center">
                        Grafikom sen est un fournisseur global de services de web.
                        Que vous soyez à la recherche d’une stratégie gérée clé en main,
                        d’un audit indépendant ou de services spécifiques à une campagne à court, moyen et long terme,
                        notre expérience et notre approche se révèleront être à coup sûr un atout précieux.
                    </p>
                </div>
            </div>
            <div class="row">
                @if ($services->isNotEmpty())
                    @foreach ($services as $service)
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="card text-white shadow-sm bg-primary mb-4 border-0 rounded-1">
                                <div class="card-body">
                                    <i class="{{ $service->icon }} text-white rounded-1 mb-2"></i>
                                    <h5 class="card-title text-white fw-bold text-uppercase">{{ $service->name }}</h5>
                                    <p class="card-text text-white">{{ $service->short_desc }}</p>
                                    <a href="{{ route('serviceDetail',$service->id) }}" class="btn btn-primary fw-bold shadow-sm rounded-1 border-0 px-3">En savoir plus</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <section class="Strategie bg-primary py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <img class="img-fluid rounded-1" width="100%" src="{{ asset('front/assets/images/nettoyage-fin-de-chantier.jpeg') }}" alt="">
                        </div>
                        <div class="col-12 col-lg-6">
                            <h2 class="fs-1 mb-2 text-white"><span>SERVICES</span><br> MARKETING DIGITAL</h2>
                            <p class="text-white">
                                <strong>Agence de marketing digital au Sénégal</strong> Grafikom sen couvre
                                l’intégralité de la chaîne de valeur du marketing.
                            </p>
                            <p class="text-white">
                                Bénéficiez de nos 05 années d’expérience dans le domaine du digital et du retour de dizaines
                                de clients satisfaits.
                            </p>
                            <p class="text-white">
                                Bénéficiez de nos 05 années d’expérience dans le domaine du digital.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card p-4 rounded-1">
                        <form action="" method="post">
                            <div class="form-group mb-1">
                                <label for="">Prénom</label>
                               <input type="text" class="form-control rounded-1">
                            </div>
                            <div class="form-group mb-1">
                                <label for="">Nom</label>
                               <input type="text" class="form-control rounded-1">
                            </div>
                            <div class="form-group mb-1">
                                <label for="">Téléphone</label>
                               <input type="text" class="form-control rounded-1">
                            </div>
                            <div class="form-group mb-1">
                                <label for="">Email</label>
                               <input type="text" class="form-control rounded-1">
                            </div>
                            <div class="form-group mb-1">
                                <label for="">Message</label>
                               <textarea type="text" class="form-control rounded-1"></textarea>
                            </div>
                            <a href="" class="btn btn-primary rounded-1 px-5 w-100 mt-4">Contactez - nous <i class="ps-2 fa-solid fa-angle-right"></i></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--section class="bg-primary py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6">
                    <div class="row">
                        <div class="col-12 col-lg-4 mb-4 text-center">
                            <i class='bx bxs-megaphone icon-card'></i>
                            <h2 class="fw-bolder fs-2 text-white">Stratégie</h2>
                        </div>
                        <div class="col-12 col-lg-4 mb-4 text-center">
                            <i class='bx bxs-sushi icon-card'></i>
                            <h2 class="fw-bolder fs-2 text-white">Production</h2>
                        </div>
                        <div class="col-12 col-lg-4 mb-4 text-center">
                            <i class='bx bx-layer icon-card'></i>
                            <h2 class="fw-bolder fs-2 text-white">Optimiser</h2>
                        </div>
                        <div class="col-12 col-lg-4 mb-4 text-center">
                            <i class='bx bx-code-alt icon-card'></i>
                            <h2 class="fw-bolder fs-2 text-white">Développer</h2>
                        </div>
                        <div class="col-12 col-lg-4 mb-4 text-center">
                            <i class='bx bx-line-chart icon-card'></i>
                            <h2 class="fw-bolder fs-2 text-white">Gestion</h2>
                        </div>
                        <div class="col-12 col-lg-4 mb-4 text-center">
                            <i class='bx bxs-chat icon-card'></i>
                            <h2 class="fw-bolder fs-2 text-white">Conseiller</h2>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <h2 class="fs-1 mb-4 text-white"><span>SERVICES</span><br> MARKETING DIGITAL</h2>
                    <p class="text-white">
                        Notre <strong>Agence de marketing digital au Sénégal</strong> Grafikom Technologie couvre
                        l’intégralité de la
                        chaîne de valeur du marketing.
                    </p>
                    <p class="text-white">
                        Bénéficiez de nos 05 années d’expérience dans le domaine du digital et du retour de dizaines
                        de clients satisfaits.
                    </p>
                </div>
            </div>
        </div>
    </section-->

    <section class="py-5">
        <div class="container">
            <div class="row g-4 align-items-xl-center">
                <!-- About image START -->
                <div class="col-lg-7">
                    <div class="row pe-xl-5">
                        <div class="col-sm-6">
                            <!-- About image -->
                            <img src="{{ asset('front/assets/images/01.jpg') }}" class="rounded w-100" alt="about-img">

                            <!-- SVG decoration -->
                            <figure class="text-end me-3 mt-n3">
                                <svg class="fill-primary" width="106px" height="96px" viewBox="0 0 106 96"
                                    style="enable-background:new 0 0 106 96;" xml:space="preserve">
                                    <path
                                        d="M104.7,50.4c0,0.1-0.1,0.4-0.3,0.7c0.1,0.1,0.2,0.1,0.4,0.2c0.1,0.3,0.5,0.6,0.3,1c-0.2,0.4,0.4,0.7-0.1,1 c0.1,0.7-0.4,1.3-0.8,1.8c-0.3,0.5-0.4,1.1-0.9,1.5c-0.4,0.4-0.6,0.9-1,1.4c-0.3,0-0.5,0-0.9,0c0.1,0.2,0.1,0.4,0.2,0.6 c-0.1,0.1-0.2,0.3-0.4,0.5c0.1,0.3,0.2,0.6,0.3,1c-0.2,0.2-0.3,0.4-0.5,0.6c0.1,0,0.3,0.1,0.5,0.2c-0.3,0.2-0.5,0.3-0.7,0.5 c0,0.1,0.1,0.1,0.2,0.2c-0.7,0.3-1.4-0.4-2.2-0.1c-0.5,0.4-0.9,1.1-1.6,1.4c-0.3,0.1,0,0.6-0.5,0.6c-0.2,0,0,0.6-0.5,0.4 c-0.2,0.5-0.6,0.7-1,1.1c-0.3,0.3-0.6,0.6-0.8,1c-0.2,0.3-0.4,0.6-0.6,0.9c-0.2,0.3-0.4,0.5-0.6,0.8c-0.1,0.2-0.1,0.6-0.3,0.8 c-0.2,0.1-0.4,0.3-0.5,0.6c-0.2-0.1-0.4-0.2-0.5-0.3c-0.5,0.2-0.9,0.4-1.4-0.1v-1.2c-0.9-0.5-1.8-0.9-2.2-2.1c0-0.4-0.1-0.9,0.2-1.3 c-0.5-1-0.1-1.9,0.4-2.8c0.6-1.1,1.4-1.9,2.3-2.8c-0.5-0.8-1.1-1.6-1.6-2.4c-0.3-0.6-0.7-1.2-0.7-1.8c0-0.7-0.2-1.4,0.2-2.1 c0.2-0.3,0-0.8,0.2-1.2c0.1-0.2,0.2-0.5,0.4-0.7c0.1-0.1,0.1-0.3,0.2-0.7c0.2-0.2,0.7-0.4,0.7-0.7c0.1-0.5,0.8-0.3,0.8-0.9 c0.2,0.1,0.2,0.2,0.3,0.3c0.3-0.1,0.6-0.2,0.9-0.3c0.1,0.2,0.2,0.4,0.3,0.6c-0.2,0.4-0.5,0.9-0.8,1.4c0.6-0.1,1-0.1,1.4-0.1 c0.2,0.2,0.2,0.2,0.3,0.3c-0.2,0.3-0.3,0.6-0.5,1c0.4,0,0.6,0.1,1,0.1c-0.1,0.4-0.2,0.8-0.3,1.2c-0.1,0.1-0.3,0.3-0.5,0.4 c0.1,0.1,0.1,0.2,0.2,0.2c0.1-0.1,0.3-0.2,0.5-0.3c0.1,0.2,0.1,0.3,0.1,0.4c-0.3,0.2-0.6,0.3-1,0.5c0.2,0.1,0.3,0.1,0.5,0.2 c-0.3,0.3-0.5,0.5-0.8,0.8c0.4,0.3,0.7,0.6,1.1,0.9c0.6,0.1,1-0.1,1.4-0.5c1-0.9,2.1-1.6,3.1-2.5c1-0.9,2.1-1.8,2.8-3 c0.2-0.3,0.5-0.5,0.7-0.7h1.2c0.1,0.1,0.2,0.2,0.3,0.4c-0.1,0.4-0.3,0.8-0.4,1.2c0.4-0.1,0.7-0.2,1-0.3 C104.4,50,104.5,50.1,104.7,50.4" />
                                    <path
                                        d="M33,74.2c-0.4,0.1-0.7,0.2-1.1,0.3c0.1-0.2,0.2-0.3,0.2-0.5c-0.3-0.4-0.6-0.7-1.1-0.7c0-0.2-0.1-0.3-0.1-0.4H30 c-0.1-0.1-0.2-0.1-0.2-0.2c-0.1-0.4-0.2-0.9-0.4-1.3c-0.3-0.4-0.2-0.9-0.2-1.3c0-0.3,0.1-0.7,0.2-1c0.3-1.2,0.8-2.4,1.4-3.5 c0.4-0.7,0.8-1.3,1.2-2c0.4-0.6,1-1.2,1.4-1.8c-0.1-0.1-0.3-0.2-0.4-0.3c-1.5-0.9-2.8-2-4-3.2c-0.6-0.6-0.6-1.4-0.7-2.1 c-0.1-0.3,0-0.6,0-0.9c0.3-0.6,0.9-0.6,1.5-0.9c0.2,0.4,0.4,0.7,0.6,1.1c0,0,0.1-0.1,0.2-0.2c0.1,0.1,0.2,0.2,0.3,0.3 c0.2,0.7,0.8,1,1.4,1.3c1.2,0.6,2.4,1.2,3.7,1.8c0.3-0.3,0.6-0.8,1-1c0.4-0.2,0.4-0.9,1-0.8c-0.1-0.1-0.2-0.2-0.2-0.3 c0.2-0.1,0.4-0.3,0.7-0.5c0.1-0.2,0.2-0.5,0.3-0.8c0.2,0,0.4,0,0.6,0c-0.1-0.1-0.2-0.2-0.3-0.3c0.5-0.1,0.5-0.6,0.8-0.8 c0.3-0.3,0.5-0.7,0.8-1.1c0.1,0,0.1,0.1,0.3,0.2c0.1-0.1,0.1-0.3,0.2-0.4c0.1,0.1,0.2,0.1,0.3,0.2c0.1-0.8,0.6-1.4,1.1-2 c0.5-0.6,0.9-1.3,1.7-1.7c0.1,0.1,0.2,0.2,0.4,0.3c-0.3,0.6-0.6,1.2-1.3,1.5v0.9c0.2,0,0.3,0,0.3-0.1c0.1-0.2,0.2-0.5,0.3-0.6 c0.5-0.4,1-0.8,1.5-1.3c0,0.4,0.1,0.7,0.1,1c-0.2,0.1-0.3,0.1-0.4,0.2c0,0,0.1,0.1,0.1,0.1c0.3-0.1,0.5-0.1,0.9-0.2 c0.1,0.2,0.2,0.4,0.3,0.6c-0.1,0.1-0.1,0.2-0.2,0.2c0,0.3,0.4,0.6,0.1,1c-0.1-0.1-0.2-0.2-0.2-0.2c0,0.1-0.1,0.1-0.1,0.2 c0,0.1,0.1,0.3,0.2,0.4c-0.1,0.6-0.5,1-0.9,1.3c-0.4,0.4-0.8,0.7-1.4,1.1c0.2,0.1,0.4,0.2,0.6,0.3c-0.1,0.2-0.2,0.4-0.3,0.6 c0,0.1,0.1,0.1,0.2,0.3c-0.2,0-0.5,0.1-0.7,0.1c0.1,0.2,0.1,0.4,0.2,0.6h-0.8c-0.1,0.3-0.3,0.5-0.4,0.8c0.1,0.1,0.2,0.2,0.3,0.3 c-0.2,0-0.4,0.1-0.7,0.1c0.1,0.2,0.1,0.4,0.2,0.6c-0.2,0-0.4,0.1-0.7,0.1c0.1,0.2,0.1,0.4,0.3,0.7c-0.3-0.1-0.5-0.2-0.8-0.3 c-0.1,0.2-0.2,0.5-0.4,0.7c0,0.1,0.1,0.2,0.1,0.2c0.1,0,0.2,0,0.3,0.1c0.3,0.2,0.4,0.6,0.8,0.8c0.4,0.2,0.5,0.6,0.8,0.9 c0.2,0.3,0.4,0.5,0.3,0.9c0,0.1,0.1,0.3,0.2,0.4c-0.1,0.1-0.1,0.2-0.3,0.4c-0.3,0-0.5,0.4-1.1,0.2c-1-0.4-2-0.7-3-0.8 c-0.1,0-0.1-0.1-0.2-0.2c-0.3,0.3-0.6,0.7-1,1.1c0,0,0,0.2,0,0.4c-0.2,0-0.4,0.1-0.7,0.1c0.2,0.3,0.4,0.5,0.6,0.9 c-0.3-0.1-0.4-0.1-0.7-0.2c0,0.1-0.1,0.2-0.2,0.3c0.1,0.4,0,0.6-0.4,0.8c-0.1,0.5-0.2,0.9-0.4,1.3c-0.2,0.1-0.3,0.1-0.4,0.2L36,69 c-0.3,0.3-0.7,0.5-1,0.8c-0.2,0.3-0.3,0.7-0.5,1.1c0,0,0.1,0.1,0.2,0.3c-0.2,0.3-0.5,0.5-0.7,0.8c0.1,0.1,0.2,0.2,0.3,0.3 c-0.2,0.2-0.3,0.4-0.5,0.6v0.7C33.4,73.7,33.2,74,33,74.2" />
                                    <path
                                        d="M60.7,78.7c0.5,0.6,0.5,0.6,1.2,0.3c0,0.2,0,0.4,0.1,0.5c0,0.1,0.1,0.2,0.2,0.3C62.1,79.9,62,80,62,80 c0.2,0.1,0.3,0.1,0.6,0.3c-0.3,0.4-0.5,0.7-0.7,1.1c0.3,0.6-0.3,0.7-0.4,1c-0.1,0.5-0.7,0.6-0.7,1.1c0,0.6-0.6,0.6-0.9,1 c-0.2,0.3-0.6,0.5-0.7,0.9c0.1,0.2,0.2,0.3,0.3,0.5c-0.3,0.2-0.6,0.4-0.9,0.5l-0.7,0.3c-0.2,0.3-0.4,0.5-0.7,0.8v0.2 c-0.7,0.5-1.4,1-2.2,1.6c0.2,0.1,0.4,0.2,0.6,0.3c-0.3,0.4-0.6,0.9-1,1.3c0.9,0.3,1.7,0.6,2.5,0.9c-0.1,0.2-0.2,0.3-0.2,0.5 c0.4,0.1,0.7,0.3,1.1,0.4v0.5c0.3,0.2,0.5,0.4,0.7,0.6c0,0.3,0,0.5,0,0.8l0.4,0.4l-1,0.9c-0.2,0.3-0.5,0.2-0.8,0 c-0.1-0.1-0.2-0.1-0.3-0.1c-1.2,0-2.2-0.4-3.3-0.8c-0.8-0.3-1.5-0.7-2.3-1c-0.2,0.2-0.6,0.4-0.6,0.8c-0.5,0.1-0.9,0.2-1.4,0.3 c-0.2-0.2-0.4-0.4-0.6-0.6c0.1-0.1,0.1-0.2,0.3-0.3c-0.1-0.2-0.2-0.5-0.3-0.6c-0.3,0.1-0.7,0.1-1,0.1c-0.2-0.3-0.3-0.6-0.5-0.9 c-0.1,0.1-0.1,0.1-0.1,0.1c-0.2-0.3-0.5-0.5-0.8-0.9c0.1-0.8-0.4-1.7-0.3-2.7c0-0.2-0.1-0.5-0.3-0.7c-0.7-0.6-0.7-1.5-1-2.3 c-0.1-0.3-0.2-0.7-0.3-1c0-0.6-0.1-1.1,0-1.7c0.2-0.9,0.3-1.8,1.3-2.1c0.3-0.1,0.7-0.1,1.1-0.2v1.8c0.4-0.2,0.6-0.4,1-0.7 c0.1,0.2,0.1,0.3,0.2,0.5c0.1,0,0.1-0.1,0.2-0.1v1c0.2-0.1,0.3-0.2,0.5-0.2c0.5,0.4,0.5,1,0.4,1.5c0.2,0.1,0.3,0.1,0.5,0.2 c-0.1,0.2-0.2,0.5-0.3,0.8c0.1,0,0.2,0,0.2,0c0.1-0.1,0.1-0.2,0.2-0.2c1-0.4,1.5-1.4,2.4-1.7c0.2-0.7,0.9-0.9,1.4-1.3 c0.4-0.5,1.1-0.8,1.6-1.2c0.5-0.4,0.8-1.1,1.5-1.3c0.4-0.8,1.1-1.4,1.9-1.9c0-0.6,0.7-0.6,0.7-1.2h1c0.1,0.1,0.2,0.2,0.3,0.3 c-0.5,0.2-0.7,0.7-1,1.2c0.7,0.1,1.1-0.7,1.7-0.3C61.1,78.5,61,78.6,60.7,78.7" />
                                    <path
                                        d="M58.1,66.7c-0.1-0.5,0.7-0.6,0.3-1.1c-0.1,0.1-0.2,0.2-0.2,0.2c0,0-0.1-0.1-0.1-0.1c-0.1-0.6-0.1-1.1,0.3-1.5 c0.4-0.5,0.9-1,1.3-1.5c0.1-0.2,0.2-0.4,0.3-0.6c-0.2-0.5-0.5-1.1-0.7-1.6c-0.3-0.6-0.3-1.2-0.5-1.8c-0.2-0.3,0.2-0.9,0.2-1.2 c-0.1-0.4-0.4-0.8,0-1.2c0-1.1,0.8-1.8,1.4-2.6h1.9c0.1,0.1,0.2,0.2,0.4,0.4c-0.3,0.4-0.6,0.7-0.9,1.1c0,0.1,0.1,0.3,0.2,0.5 c0.1,0,0.3,0.1,0.4,0c0.3-0.3,0.7-0.2,1-0.2c0.1,0.3,0.2,0.5,0.3,0.7c-0.2,0.2-0.3,0.4-0.6,0.8c0.4,0.1,0.7,0.1,1,0.1v1.1 c0.8,0,0.8-0.9,1.5-0.9c0.3-0.4,0.7-0.8,1.1-1.1c0.4-0.4,0.9-0.8,1.3-1.3c0.4-0.4,0.8-0.8,1.1-1.2c0.4-0.4,0.7-0.9,0.9-1.2 c0.5-0.2,0.7-0.3,1.1-0.4c0.1,0.2,0.3,0.3,0.3,0.5c0,0.1-0.1,0.3-0.2,0.5c-0.1,0.2-0.2,0.3-0.2,0.6c0.3-0.1,0.7-0.3,1-0.4 c0.2,0.4,0.4,0.8,0.7,1.4c0,0,0,0.2,0,0.4c0,0.2,0.1,0.3,0.2,0.5c0,0.1-0.1,0.2-0.2,0.4c0.1,0.1,0.2,0.2,0.3,0.3 c-0.7,1-1.2,2.1-2,3.1c-0.6,0.9-0.5,0.9-1,1.2c0.1,0.1,0.1,0.2,0.2,0.2c-0.9,1-1.8,2-2.7,3v0.4c0.7,0.5,1.4,0.9,2.1,1.3 c-0.1,0.2-0.2,0.3-0.3,0.5c0.3,0.2,0.5,0.7,1,0.5c0.1,0.2,0.2,0.4,0.3,0.6c-0.1,0.1-0.1,0.2-0.3,0.4c0.3,0.3,0.5,0.5,0.8,0.8 c-0.1,0.3-0.2,0.5-0.3,0.8c0.1,0.1,0.2,0.3,0.2,0.4c0,0.1-0.1,0.2-0.1,0.2c-0.1,0.1-0.3,0.1-0.4,0.2c-0.5,0.5-0.6,0.6-1.2,0.4 c-0.8-0.3-1.6-0.4-2.4-0.8c-1-0.5-1.8-1.2-2.8-1.9c-0.4,0.3-0.9,0.7-1.3,1.2c-0.4,0.5-1,0.8-1.8,1.1c0.1-0.2,0.2-0.3,0.3-0.5 c-0.5,0.1-0.9,0.2-1.3,0.3l-0.1-0.1c0.3-0.2,0.5-0.4,0.8-0.6l-0.4-0.4h-0.8c-0.1-0.3-0.2-0.5-0.4-0.9h-0.9 C58.3,67.2,58.2,66.9,58.1,66.7" />
                                    <path
                                        d="M63,44.6c-0.4,0.1-0.7,0.2-1.2,0.3c-0.5-0.4-1.1-0.8-1.7-1.2c-0.7-0.5-1.4-1.2-2.2-1.5 c-0.2-0.1-0.4-0.1-0.7-0.2c-0.3-0.5-0.4-1.4-1.3-1.3c-0.4-0.4-0.5-1.1-1.1-1.1c-0.2-0.4-0.3-0.8-0.6-1c-1.2-1.1-2.1-2.5-2.9-4.2 c-0.1-0.5-0.1-1.2-0.2-1.9c-0.2-1.1,0.4-2,1.3-2.6c0.3-0.2,0.4-0.5,0.8-0.5c0.3,0,0.6-0.1,1-0.2c0.1,0.1,0.3,0.2,0.5,0.4 c-0.3,0.5-0.9,0.9-1,1.6c0.7,0.2,1-0.6,1.7-0.6c0.1,0.1,0.2,0.2,0.4,0.3c-0.3,0.4-0.4,0.6-0.7,1.1c0.5-0.2,0.8-0.2,1-0.3 c0.3-0.4,0.8-0.6,1.2-1.1c0.3-0.4,0.7-0.8,1.2-1.1c0.7-0.4,1.2-1.1,1.8-1.6c0.9-0.7,1.8-1.6,2.8-2.2c0.4-0.2,0.7-0.7,1-1 c0.3-0.3,0.8-0.5,0.9-0.9h1.5v1c0,0-0.2,0.2-0.4,0.4c0.2,0,0.4-0.1,0.6-0.1c0.2,0,0.4-0.1,0.7-0.2c0,0.7,0,1.4,0.5,1.8 c-0.1,0.1-0.2,0.2-0.3,0.4c0.2,0.1,0.3,0.2,0.7,0.4c-0.4,0.1-0.5,0.1-0.6,0.2c0.1,0.1,0.1,0.3,0.2,0.4c0,0.1,0,0.3,0,0.4 c-0.4,0.6-0.8,1.1-1.3,1.8c-0.1,0-0.3,0-0.5,0.1c0.1,0.1,0.1,0.2,0.2,0.3c-0.1,0.2-0.1,0.3-0.2,0.5c-1,0-1,1-1.6,1.4 c0.1,0.2,0.2,0.3,0.2,0.3c-0.4,0.4-0.8,0.8-1.2,1.2c0,0,0,0,0,0c-0.2,0.2-0.4,0.4-0.6,0.6c-0.1,0-0.1-0.1-0.2-0.1V35 c-0.1-0.1-0.2-0.2-0.4-0.3c0,0.3,0.1,0.4,0.1,0.7c-0.3,0.4-0.6,0.8-1,1.3c-0.2-0.1-0.3-0.2-0.4-0.3c-0.4,0.5-0.8,1-1.2,1.5 c0.2,0.1,0.3,0.2,0.5,0.3c-0.2,0.3-0.4,0.5-0.5,0.7c0,0.1,0,0.2,0.1,0.2c0.7,0.8,1.5,1.5,2,2.3C62.6,42.3,63.4,43.3,63,44.6" />
                                    <path
                                        d="M78.7,28.3c0.1-0.1,0.1-0.1,0.2-0.2c0-0.1-0.1-0.1-0.1-0.2c-0.3-0.3-0.7-0.5-0.9-0.8c-0.2-0.3-0.5-0.5-0.7-0.7 c-0.3-0.3-0.7-0.8-0.7-1.2c0-0.7-0.1-1.4,0.1-2.2c0.3-1.3,1-2.3,1.9-3.2c1.1-1.1,2.3-2.3,3.5-3.5c-0.5-0.4-0.5-1.1-1.2-1.3 c-0.3-0.6-0.6-1.2-0.9-1.8c-0.3-0.5-0.2-1.1-0.2-1.7c0-0.4,0-0.8,0-1.2c0.4-0.5,0.8-1,1.1-1.4h1.9c-0.3,0.5-0.6,1-0.8,1.4 c0.7,0.5,1-0.6,1.6-0.3c0.4,0.5-0.3,0.8-0.6,1.3c0.4-0.1,0.7-0.2,1-0.2c0.2,0.5,0.1,1-0.2,1.5c0.2,0.1,0.3,0.1,0.5,0.2 c0.1,0.1-0.1,0.2-0.2,0.4c0.2,0.3,0.4,0.6,0.7,1c1.9-2,4.2-3.3,5.7-5.5h1.1c-0.1,0.4-0.2,0.7-0.3,1.1c0.3-0.1,0.6-0.2,0.9-0.3v0.9 c0.2,0,0.3,0.1,0.4,0.1c0,0.1,0.1,0.1,0.1,0.2c0,0.1,0,0.2,0,0.3c0.2,1.2-0.4,2.1-1,3c-0.7,1-1.4,1.8-2.2,2.8c0.6,0.7,1.4,1,2.2,1.6 c0,0.1,0,0.3,0.1,0.5c0.2,0.3,0.5,0.5,0.6,0.8c0.2,0.7,0.7,1.4,0.4,2.3c-0.1,0-0.3,0.1-0.5,0.2c-0.2,0.1-0.4,0.2-0.6,0.2 c-0.3-0.3-1-0.2-0.9-0.8c-0.7-0.2-1.3-0.4-1.9-0.5c-0.1-0.2-0.3-0.4-0.4-0.7h-1.2c0-0.1-0.1-0.2-0.1-0.4c-0.5-0.4-0.8,0.1-1.1,0.1 c-0.4,0.4-0.7,0.8-1,1.1c-0.1-0.1-0.2-0.1-0.3-0.2c-0.1,0.2-0.3,0.4-0.5,0.6c0,0,0,0,0.1,0.2c-0.5,0.1-0.6,0.7-0.8,1.1 c-0.2-0.1-0.3-0.2-0.5-0.3c0,0.2-0.1,0.4-0.1,0.6c-0.1,0-0.2,0-0.4,0.1c0,0.5-0.1,1-0.8,0.9c-0.2,0.3-0.6,0.6-0.6,0.8 c0.1,0.7-0.5,1-0.7,1.6c-0.1,0.7-0.1,0.7,0.1,1.1c-0.5,0.4-1,0.7-1.7,0.8C78.9,28.5,78.8,28.4,78.7,28.3" />
                                    <path
                                        d="M12.6,15.5c-0.3,0-0.5,0.1-0.7,0.1c0.1,0.1,0.2,0.2,0.3,0.4c-0.3,0.5-0.8,0.8-1.2,1.3l0.2,0.2 c-0.3,0.2-0.6,0.5-0.8,0.6c-0.1,0.4,0.2,0.8-0.3,1c0.4,0.3,0.8,0.5,1.2,0.8c1.2,0.8,2.5,1.5,3.4,2.6c0.6,0.6,1.1,1.2,1.1,2.1 c0,0.2,0.2,0.3,0.3,0.5c-0.3,0.2-0.7,0.4-1.1,0.7c-2.3-1.3-4.6-2.5-6.7-4.2c-0.2,0.1-0.5,0.2-0.5,0.3c-0.2,0.7-0.7,1.2-1.2,1.6 c-0.1,0.1,0,0.2-0.1,0.3c-0.2,0-0.4,0-0.7,0.1C6,24.1,6,24.2,6.1,24.5c-0.4,0.4-0.8,0.9-0.9,1.6c-0.1,0.4-0.5,0.7-0.8,1.2v2.5 c-0.2,0-0.4,0-0.6,0c0,0.1-0.1,0.3-0.1,0.4H2.8c-0.1-0.4-0.2-0.7-0.4-1.1c-0.2,0.1-0.4,0.2-0.7,0.3c-0.1-0.2-0.1-0.3-0.1-0.4 c-0.1,0-0.1-0.1-0.2-0.1c-0.5,0.1-0.8-0.3-0.9-0.6c-0.2-1-0.9-2.1-0.3-3.2c0-1.1,0.7-2,1.1-2.9c0.1-0.3,0.7-0.3,0.5-0.8 c-0.1-0.2,0.3-0.6,0.5-0.9c0.2-0.3,0.4-0.5,0.6-0.8c0.2-0.3,0.5-0.5,0.8-0.8c0.2-0.2,0.4-0.5,0.6-0.8c-1.4-1-2.2-2.5-3.2-3.9 c-0.3-1.3-0.8-2.6-0.6-4.2c0.3-0.4,0.7-0.8,1.2-1.3c0.5,0.1,1-0.2,1.5,0.3c-0.3,0.4-0.6,0.8-0.9,1.2c0.1,0.1,0.2,0.2,0.2,0.2 C3.1,10.6,3.4,9.7,4,9.9c0.1,0.2,0.2,0.4,0.3,0.6c-0.2,0.1-0.4,0.3-0.7,0.4C3.8,11,3.9,11.1,4,11.2c0.3-0.3,0.6-0.3,1,0.1 c0,0.3,0.2,0.6-0.2,0.9c0.2,0.1,0.3,0.1,0.5,0.3C5.1,12.7,5,13,4.8,13.2c0.2,0.1,0.3,0.1,0.6,0.2c-0.3,0.1-0.4,0.1-0.6,0.2 c0,0.2,0,0.4,0.1,0.6c0.4,0.6,0.9,1.1,1.4,1.8c0.3-0.3,0.5-0.4,0.7-0.6c1.2-1.2,2.3-2.5,3.8-3.4c0-0.4,0.4-0.4,0.6-0.6 c0.2-0.3,0.5-0.5,0.6-0.7h0.8c-0.3,0.5-0.9,0.8-0.7,1.5c0.5-0.3,1-0.6,1.6-0.9c-0.1,0.3-0.1,0.6-0.1,0.9c0.2,0.1,0.5,0.3,0.8,0.4 c-0.1,0.2-0.2,0.3-0.2,0.5c0.1,0,0.2,0,0.3,0.1c0,0,0.1,0.1,0,0.1c-0.3,0.4-0.6,0.7-0.8,1.1C13.4,14.8,12.9,15.1,12.6,15.5" />
                                    <path
                                        d="M33.3,27c0.9-1.1,1.7-2,2.4-3c0.7-0.9,1.3-1.8,1.9-2.8c-0.1-0.1-0.1-0.2-0.3-0.3c0.2-0.2,0.4-0.4,0.6-0.7h0.7 c0.3,0.3,0.5,0.7,0.8,0.8c0.4,0.1,0.4,0.4,0.6,0.7c0.5,0.8,0.9,1.6,0.5,2.7c-0.3,0.6-0.5,1.3-0.8,1.9c-0.1,0.2-0.1,0.4-0.2,0.7 l-0.6,0.6v0.7c-0.4,0.8-0.8,1.5-1.2,2.2c0.6,0.4,1.1,0.8,1.6,1.1c1.1,0.7,1.9,1.5,2.5,2.7c0.1,0.3,0.2,0.5,0.3,0.9 c0,0.1-0.1,0.3-0.2,0.5c-0.2,0.1-0.5,0.2-0.7,0.3c-0.5-0.2-1-0.3-1.4-0.5c-0.4-0.2-0.9-0.4-1.3-0.6c-0.1-0.7-0.8-0.4-1.1-0.8 c-0.3-0.4-0.8-0.5-1.3-0.8c-1.5,1.5-2.8,3.1-4,4.9c-0.1,0.1-0.1,0.3-0.1,0.5c-0.5,0.4-1,0.3-1.5,0v-0.4c-0.7-0.4-1.3-0.8-2-1.2 c-0.3-0.4-0.2-1-0.4-1.5c-0.2-0.5,0-1-0.1-1.4c0.7-1.7,1.6-3.1,2.9-4.4v-0.8c-0.7-0.5-1.2-1.3-1.6-2.1c-0.2-0.3-0.2-0.6-0.2-0.9 c-0.1-0.6-0.4-1.2-0.3-1.9c0-1.3,0.8-2.2,2-2.6c0.8-0.3,1.5-0.1,2.3-0.2c-0.4,0.9-1.5,0.8-2.1,1.6c1.1,0,1.7-1.1,2.8-0.9 c0,0.3-0.1,0.5-0.1,0.8c0.2,0.1,0.5,0.2,0.8,0.3v1.4c-0.3,0.5-0.6,1-0.9,1.5C33.2,26.3,33.3,26.6,33.3,27" />
                                    <path
                                        d="M52.3,13c-0.4,0.5-0.8,1-1.2,1.6V16c-0.4,0.2-0.8,0.3-1.2,0.5c-0.5-0.5-0.7-1.2-0.9-1.8 c-0.2,0.1-0.4,0.2-0.7,0.3c-0.2-0.3-0.5-0.6-0.7-1c-0.4-1-0.4-2.1-0.4-3.2c0.2-0.4,0.4-0.8,0.6-1.3c-0.3,0-0.6,0-0.7-0.1 c-0.7-0.7-1.5-1.5-2.1-2.3c-0.4-0.4-0.7-0.9-0.9-1.4c-0.2-0.8-0.2-1.6-0.3-2.4c0.3-0.5,0.6-1,1.1-1.4c0.4-0.4,1-0.5,1.6-0.8 c0.1,0.2,0.3,0.3,0.4,0.5c-0.1,0.1-1.2,1.1-1.2,1.1c0.1,0.1,0.2,0.2,0.3,0.3c0.5-0.4,1-0.8,1.8-0.5c-0.2,0.3-0.4,0.5-0.6,0.9 c0.4-0.1,0.6-0.2,0.9-0.3c0.1,0.2,0.3,0.4,0.5,0.7c-0.3,0.3-0.6,0.6-0.9,0.9c0.2,0,0.3,0.1,0.5,0.1c-0.3,0.4-0.1,1-0.8,1.2 C48,6.5,48.7,7,49.5,7.5c2.5-2.1,4.9-4.1,7.4-6.1H58c-0.2,0.4-0.3,0.7-0.5,1c0.3,0.2,0.6,0,0.9-0.2c0.8,0.8,1,1.8,0.9,2.8 c-0.3,0.4-0.7,0.9-1.1,1.4c0,0,0.1,0.1,0.2,0.2c-0.2,0-0.4,0.1-0.6,0.1c0.1,0.1,0.2,0.2,0.2,0.2h-0.4c-0.8,1.5-2.1,2.4-3,3.8 c1.3,0.7,2.8,1.3,4.2,2.1c0,0.2,0.1,0.4,0.1,0.7c0.2-0.2,0.3-0.3,0.4-0.4c0.6,0.1,0.5,0.7,1,1c0.4,0.2,0.7,0.8,1,1.2v1.3 c-0.1,0.1-0.2,0.2-0.4,0.4c-1.2-0.1-2.1-0.8-3.2-1.3c0,0-0.1,0.1-0.1,0.1c-0.7-0.2-1.2-1-2-0.9c-0.4-0.5-1.1-0.6-1.6-0.9 C53.5,13.7,53,13.3,52.3,13" />
                                    <path
                                        d="M85.2,31c0.2,0.1,0.4,0.2,0.7,0.4c-0.1,0.4-0.1,0.7-0.2,1.2c0.2,0.3,0.3,0.8,0.9,1c0.3-0.4,0.4-0.8,0.9-1 c0.3-0.1,0.6-0.6,0.8-1c0.3-0.4,0.7-0.6,0.9-1.1c0.2-0.4,0.6-0.6,0.9-1c0.3-0.4,0.5-0.8,0.7-1.2h1.3c0.1,0.4,0.2,0.7-0.2,1.1 c0.4,0,0.6,0,0.9,0c0.1,0.5,0.2,1,0.3,1.5c-0.2,0.1-0.3,0.1-0.5,0.2c0,0.1,0,0.2,0.1,0.3c0.3,0.8,0.3,1-0.3,1.6 c-0.3,0.3-0.4,0.6-0.3,0.9c0.2,0.4-0.3,0.2-0.1,0.6c-0.2-0.2-0.3-0.3-0.5-0.4v0.6c-0.2,0-0.4,0.1-0.7,0.1v0.6 c-0.3,0.3-0.5,0.5-0.7,0.7c0.4,0.4,0.8,0.7,1.1,1v0.9c0.2,0.2,0.5,0.5,0.8,0.8c-0.1,0.1-0.1,0.2-0.2,0.4c0.1,0.2,0.3,0.5,0.5,0.9 c-0.2,0.5-0.5,1-0.7,1.4h-0.9c-1.1-0.6-2.2-1.2-3.2-1.8c-0.2,0.3-0.3,0.5-0.5,0.7c-0.2-0.1-0.3-0.2-0.6-0.3v1.1 c-0.3-0.1-0.6-0.2-1-0.4c0.2,0.3,0.2,0.3,0.3,0.5c-0.2,0.2-0.4,0.4-0.8,0.7c-0.1-0.4-0.1-0.7-0.2-1c0.2-0.1,0.3-0.1,0.5-0.2 c0-0.1,0-0.2,0.1-0.3c-0.1,0-0.3-0.1-0.4-0.1c0-0.2,0.1-0.4,0.2-0.7c-0.2,0.2-0.3,0.3-0.3,0.3c-0.5-0.1-0.9-0.2-1.4-0.3 c-0.1-0.1-0.2-0.3-0.3-0.5c0.1-0.3,0.2-0.7,0.3-1.1c0.2,0,0.5,0.1,0.8,0.1c0,0,0-0.1,0-0.1c-0.3-0.1-0.6-0.3-0.8-0.4 c0.2-0.3,0.3-0.6,0.5-0.9c-0.7-1.3-1.6-2.5-2-3.8c-0.3-0.9,0.1-1.9,0.2-2.8c0.1-0.7,0.7-1.2,1.4-1.6c0.1-0.1,0.2-0.1,0.3-0.2h1.1 c0.2,0.2,0.3,0.3,0.4,0.4c-0.2,0.2-0.4,0.4-0.6,0.6v0.7c0.2-0.1,0.5-0.1,0.8-0.2c0.1,0.1,0.3,0.3,0.5,0.4 C85.6,30.6,85.4,30.8,85.2,31" />
                                    <path
                                        d="M17.3,42.6c0.1,0.1,0.2,0.2,0.4,0.4c-0.7,0.6-1.4,1.2-2.1,1.8c0,0,0,0.1,0,0.1c0.1,0,0.3,0,0.4-0.1 c0.2-0.2,0.4-0.4,0.6-0.4c0.5-0.3,1-0.5,1.4-0.8c0.4,0.3,0.1,0.6-0.1,1c0.3-0.1,0.4-0.2,0.6-0.2c0.1,0.1,0.2,0.2,0.3,0.3 c0,0.5,0,0.9,0,1.4c-0.1,0.1-0.3,0.3-0.4,0.4c0,0.1,0,0.1,0.1,0.2c0.3,0.2,0.5,0.4,0.8,0.6c0.3,0.2,0.7,0.2,0.7,0.7 c0,0.1,0.1,0.1,0.2,0.2c0.2,0.2,0.5,0.3,0.7,0.5c0.2,0.2,0.3,0.5,0.5,0.8c0,0.2,0,0.5,0,0.8c-0.2,0.2-0.4,0.4-0.5,0.5 c-1.4-0.5-2.8-1-4.2-1.5c-0.3,0.2-0.6,0.3-1,0.5c0,0,0,0,0-0.1c-0.3,0.3-0.6,0.6-1,1c0,0.1,0,0.3,0,0.5c-0.6,0.6-1.2,1.2-1.7,1.7 c-0.3,0.8-0.1,1.6-1.2,1.7c-0.2-0.3-1-0.4-0.8-1.2c-0.2-0.1-0.5-0.1-0.8-0.2c-0.1,0-0.2,0.1-0.3,0.2c-0.3-0.3-0.5-0.6-0.9-1 c-0.1-0.7-0.2-1.6-0.3-2.6c0.9-1,1.9-2,2.8-3.1c-0.4-0.2-0.8-0.4-1.1-0.7c-0.4-0.3-0.6-0.6-1-1c0.1-0.3,0.2-0.6,0.3-0.9 c-0.2-0.1-0.3-0.1-0.5-0.2v-0.8c0.1-0.1,0.1-0.1,0.2-0.2c0.3-0.1,0.7-0.1,1.1-0.2c1.1,0.6,2.3,1.3,3.5,2C15.4,44,16.1,43,17.3,42.6" />
                                </svg>
                            </figure>
                        </div>

                        <div class="col-sm-6">
                            <!-- Skill set -->
                            <div class="row mb-4">
                                <div class="col-sm-6 mb-4 mb-sm-0">
                                    <div class="bg-primary text-white rounded-1 text-center p-3">
                                        <span class="h2 text-white">10+</span>
                                        <p class="mb-0 text-white">années expérience</p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="bg-primary rounded-1 text-center p-3">
                                        <span class="h2 text-white">05</span>
                                        <p class="mb-0 text-white">Clients satisfaits</p>
                                    </div>
                                </div>
                            </div>
                            <!-- About image -->
                            <img src="{{ asset('front/assets/images/02.jpg') }}" class="rounded w-100" alt="about-img-2">
                        </div>
                    </div> <!-- Row END -->
                </div>
                <!-- About image END -->

                <!-- About content START -->
                <div class="col-lg-5">
                    <h2 class="fs-3 fw-bolder">Nous vous accompagnons de A à Z,</h2>
                    <h4 class="fs-4 fw-bolder mb-4"><span>Votre agence de marketing digital au Sénégal:</span></h4>
                    <!-- List -->
                    <ul class="list-group list-group-borderless rounded-1 mb-4">
                        <li class="list-group-item heading-color d-flex align-items-center">
                            <i class='bx bxs-show me-2'></i>
                            Définition de vos besoins marketing vidéo
                        </li>
                        <li class="list-group-item heading-color d-flex align-items-center">
                            <i class='bx bxs-video me-2'></i>
                            Réalisation des vidéos
                        </li>
                        <li class="list-group-item heading-color d-flex align-items-center">
                            <i class='bx bxs-pen me-2'></i>
                            Proposition de concepts créatifs
                        </li>
                        <li class="list-group-item heading-color d-flex align-items-center">
                            <i class='bx bxs-film me-2'></i>
                            Réalisation des vidéos
                        </li>
                        <li class="list-group-item heading-color d-flex align-items-center">
                            <i class='bx bx-calendar-alt me-2'></i>
                            Organisation des tournages dans le spôt
                        </li>
                        <li class="list-group-item heading-color d-flex align-items-center">
                            <i class='bx bxl-jquery me-2'></i>
                            Diffusion des contenus
                        </li>
                    </ul>
                    <!-- Button -->
                    <a href="#" class="btn btn-primary border-0 rounded-1 mb-0 px-3">Demandez un devis <i class="ps-2 fa-solid fa-angle-right"></i></a>
                </div>
                <!-- About content END -->
            </div>
        </div>
    </section>

    <section class="bg-light py-5">
        <div class="container">
            <h1 class="mb-3 text-center">NOS ACTUALITÉS</h1>
            <div class="row">
                @if ($blogs->isNotEmpty())
                    @foreach ($blogs as $blog)
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="card rounded-1 border-0 shadow-sm mb-4">
                            @if (!empty($blog->image))
                                <img class="bd-placeholder-img card-img-top rounded-0 p-2" src="{{ asset('uploads/blogs/'.$blog->image) }}" width="100%" height="180" role="img" alt="{{ $blog->name }}"/>
                            @else
                                <img class="bd-placeholder-img card-img-top rounded-0" src="" alt="{{ $blog->name }}">
                            @endif

                            <div class="card-body">
                                <h5 class="card-title text-uppercase fw-bold">{{ $blog->name }}</h5>
                                <p class="card-text">{{ $blog->short_desc }}</p>
                                <a href="{{ route('blogDetail',$blog->id) }}" class="btn btn-primary fw-bold rounded-1 px-3">En savoir plus <i class="ps-2 fa-solid fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <section class="py-5 bg-thirt">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-12 col-lg-6 d-flex flex-column gap-4">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"
                            fill="none">
                            <path opacity="0.2" d="M42 18L27.2719 28.5H20.7281L6 18L24 6L42 18Z" fill="#081f48" />
                            <path
                                d="M42.8325 16.7512L24.8325 4.75125C24.586 4.58679 24.2963 4.49902 24 4.49902C23.7037 4.49902 23.414 4.58679 23.1675 4.75125L5.1675 16.7512C4.96202 16.8883 4.79358 17.0741 4.67713 17.2919C4.56068 17.5098 4.49984 17.753 4.5 18V37.5C4.5 38.2956 4.81607 39.0587 5.37868 39.6213C5.94129 40.1839 6.70435 40.5 7.5 40.5H40.5C41.2957 40.5 42.0587 40.1839 42.6213 39.6213C43.1839 39.0587 43.5 38.2956 43.5 37.5V18C43.5002 17.753 43.4393 17.5098 43.3229 17.2919C43.2064 17.0741 43.038 16.8883 42.8325 16.7512ZM18.135 28.5L7.5 36V20.9119L18.135 28.5ZM21.2044 30H26.7956L37.4137 37.5H10.5862L21.2044 30ZM29.865 28.5L40.5 20.9119V36L29.865 28.5ZM24 7.80187L39.3581 18.0412L26.7956 27H21.2081L8.64563 18.0412L24 7.80187Z"
                                fill="#081f48" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="fs-3">Abonnez-vous à notre newsletter</h2>
                        <p class="mb-0">Profitez de l'utilisation de Block Template et restez à l'écoute
                            des
                            dernières mises à jour et actualités.</p>
                    </div>
                    <div>
                        <form class="row g-2 d-flex mx-lg-7" action="" method="post"
                            name="mc-embedded-subscribe-form" novalidate>
                            <div class="col-md-9 col-12">
                                <label for="notificationEmail" class="visually-hidden"></label>
                                <input type="email" id="notificationEmail" class="form-control rounded-1"
                                    name="EMAIL" placeholder="Email" required="" />
                                <div class="invalid-feedback text-start">Email.</div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="d-grid">
                                    <button class="btn btn-primary rounded-1" type="submit"
                                        name="subscribe">S'abonner</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
