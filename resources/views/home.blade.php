@extends('layouts.app')
@section('main')

    <section class="hero">
        @if ($banners->isNotEmpty())
            <div id="diaporama" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($banners as $banner)
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ asset('uploads/banners/'.$banner->image) }}" role="img" preserveAspectRatio="xMidYMid slice" focusable="false"/>

                        <div class="carousel-caption d-none d-md-block p-lg-5">
                            <h1 class="text-white">{{ $banner->name }}</h1>
                            <p class="text-white">{{ $banner->content }}</p>
                            {{-- <a class="btn btn-primary px-4 rounded-0 mb-3" href="">En savoir plus <i class="ps-2 fa-solid fa-angle-right"></i></a> --}}
                        </div>
                    </div>
                    <button class=" carousel-control-prev" type="button" data-bs-traget="#diaporama" data-bs-slide="prev">
                        <span class=" carousel-control-prev-icon"></span>
                    </button>
                    <button class=" carousel-control-next" type="button" data-bs-traget="#diaporama" data-bs-slide="next">
                        <span class=" carousel-control-next-icon"></span>
                    </button>
                    @endforeach
                </div>
            </div>
        @endif
    </section>

    <section class="about bg-light py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 mb-3">
                    <h2 class="fs-1 text-uppercase text-center py-1">Nettoyage professionnel Sénégal</h2>
                    <p class="text-center">Le nettoyage professionnel au Sénégal est un secteur en pleine croissance, NPS facilite le quotidien des entreprises, institutions, particuliers soucieux d’hygiène et de propreté. A travers une large gamme de services NPS offres une qualité de nettoyage premium dans plusieurs secteurs d’activité. Présent sur les secteurs d’Mbour, Saly et Somone, NPS garanti un résultat professionnel dans vos chantiers de nettoyage.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section-helper bg-primary py-5 text-center">
        <div class="container">
           <div class="help-container">
                <h2 class="title text-white">Pourquoi Choisir Nettoyage Professionnel Sénégal?</h2>
                <p class="card-text text-white mt-3">Choisir un service de nettoyage professionnel au Sénégal offre de nombreux avantages, que ce soit pour les entreprises, les particuliers ou les institutions. Voici quelques raisons de faire appel à des professionnels du nettoyage :</p>
                <a href="{{ route('contact') }}" class="btn btn-primary fw-bold rounded-1 px-4 mt-3">Contactez-nous maintenant <i class="ps-2 fa-solid fa-angle-right"></i></a>
           </div>
        </div>
    </section>

    <section class="faqs">
        <div class="container py-2">
            <div class="row">
                <div class="col-md-12 py-4">
                    <div class="accordion" id="accordionFlushExample">
                        @if ($faqs->isNotEmpty())
                            @foreach ($faqs as $key => $faq)
                            <div class="accordion-item shadow-sm mb-2">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed fs-5 f-title" type="button" data-bs-toggle="collapse" data-bs-target="#flush-{{ $key }}" aria-expanded="false" aria-controls="flush-{{ $key }}">
                                        {{ $faq->question }}
                                    </button>
                                </h2>
                                <div id="flush-{{ $key }}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">{{ $faq->answer }}</div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="services py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <h2 class="text-center fs-1 pb-2">NOS SERVICES</h2>
                </div>
            </div>
            <div class="row">
                @if ($services->isNotEmpty())
                    @foreach ($services as $service)
                        <div class="col-sm-12 col-md-4 col-lg-4 mb-4">
                            <div class="card h-100 shadow-sm border-0 rounded-1">
                                <img src="{{ asset('uploads/services/'.$service->image) }}" width="300" height="225" class="card-img border-0 rounded-1" alt="{{ $service->name }}">
                                <div class="card-img-overlay mb-4 d-block text-center align-content-center">
                                    <h5 class="card-title bg-white shadow-sm fw-bolder fs-4 text-center text-uppercase p-4">{{ $service->name }}</h5>
                                    <a href="{{ route('serviceDetail',$service->id) }}" class="btn btn-primary fw-bold shadow-sm rounded-0 border-0 px-3">En savoir plus</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
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

@endsection
