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
                    <a href="{{ $pages->url }}" class="btn btn-primary fw-bold rounded-0 border-0 px-3">En savoir plus <i class="ps-2 fa-solid fa-angle-right"></i></a>
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
                    <h2 class="text-center fs-1 pb-2">NOS <span>SERVICES</span></h2>
                </div>
            </div>
            <div class="row">
                @if ($services->isNotEmpty())
                    @foreach ($services as $service)
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="card shadow-sm border-0 rounded-1 mb-4">
                                <img src="{{ asset('uploads/services/'.$service->image) }}" width="300" height="225" class="card-img border-0 rounded-1" alt="{{ $service->name }}">
                                <div class="card-img-overlay mb-4 d-block text-center align-content-center">
                                    <h5 class="card-title bg-white shadow-sm fw-bolder fs-4 text-center text-uppercase p-4">{{ $service->name }}</h5>
                                    <a href="{{ route('serviceDetail',$service->id) }}" class="btn btn-primary fw-bold shadow-sm rounded-0 border-0 px-3">En savoir plus</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="card shadow-sm bg-primary border-0 rounded-1">
                        <div class="card-body p-4">
                          <h5 class="card-title text-white">Card title</h5>
                          <p class="card-text text-white">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </section>

    <section class="Valeur bg-primary py-5">
        <div class="container">
            <h1 class="mb-3 text-center text-white">NOS VALEURS</h1>
            <div class="row">
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="card rounded-1 p-2 mb-4">
                        <h5 class="fw-bolder fs-4 text-uppercase">NOTRE MISSION</h5>
                        <div class="card-body">
                            <p> Accomplir une tâche crédible et pérenne
                                pour maintenir une propreté et une hygiène agréable
                                pour votre environnement.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="card rounded-1 p-2 mb-4">
                        <h5 class="fw-bolder fs-4 text-uppercase">NOTRE VISION</h5>
                        <div class="card-body">
                            <p> Etre la solution de référence sur le marché pour
                                tout besoin de nettoyage technique de nos clients.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="card rounded-1 p-2 mb-4">
                        <h5 class="fw-bolder fs-4 text-uppercase">NOS VALEURS</h5>
                        <div class="card-body">
                            <li class="list-unstyled"> -Engagement</li>
                            <li class="list-unstyled"> -Innovation</li>
                            <li class="list-unstyled"> -Esprit d’équipe</li>
                            <li class="list-unstyled"> -Respect et Intégrité</li>
                            <li class="list-unstyled"> -Satisfaction client</li>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="Partner bg-light py-5">
        <div class="container">
            <h1 class="mb-3 text-center">NOS PARTENAIRES</h1>
            <div class="row">
                @if ($parterns->isNotEmpty())
                    @foreach ($parterns as $partern)
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="card bg-primary rounded-1 border-0 shadow-sm mb-4">
                            @if (!empty($partern->image))
                                <img class="bd-placeholder-img card-img-top rounded-0 p-2" src="{{ asset('uploads/parterns/'.$partern->image) }}" width="50" height="50" role="img" alt="{{ $partern->name }}"/>
                            @else
                                <img class="bd-placeholder-img card-img-top rounded-0" src="" alt="{{ $partern->name }}">
                            @endif

                            <div class="card-body pt-1">
                                <h5 class="card-title text-uppercase text-white text-center fw-bold">{{ $partern->name }}</h5>
                                <p class="card-text">{{ $partern->short_desc }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <section class="Blog bg-light py-5">
        <div class="container">
            <h1 class="mb-3 text-center">NOS ACTUALITÉS</h1>
            <div class="row">
                @if ($blogs->isNotEmpty())
                    @foreach ($blogs as $blog)
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="card rounded-0 border-0 shadow-sm mb-4">
                            @if (!empty($blog->image))
                                <img class="bd-placeholder-img card-img-top rounded-0 p-2" src="{{ asset('uploads/blogs/'.$blog->image) }}" width="100%" height="180" role="img" alt="{{ $blog->name }}"/>
                            @else
                                <img class="bd-placeholder-img card-img-top rounded-0" src="" alt="{{ $blog->name }}">
                            @endif

                            <div class="card-body">
                                <h5 class="card-title text-uppercase fw-bold">{{ $blog->name }}</h5>
                                <p class="card-text">{{ $blog->short_desc }}</p>
                                <a href="{{ route('blogDetail',$blog->id) }}" class="btn btn-primary fw-bold rounded-0 px-3">En savoir plus <i class="ps-2 fa-solid fa-angle-right"></i></a>
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
