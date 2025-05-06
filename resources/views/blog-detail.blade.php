@extends('layouts.app')
@section('main')

    <section class="Breadcrumb bg-primary py-5">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item">
                        <a class="nav-link px-2 fw-bold text-white" href="{{ route('home') }}">Acceuil</a>
                    </li>
                    <span class="text-white fw-bold">/</span>
                    <li class="fw-bold active" aria-current="page">
                        <a class="nav-link px-2 fw-bold active" href="{{ route('blogs') }}">Blogs</a>
                    </li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="section-2  py-5">
        <div class="container py-2">
            <div class="image-red-background">
                <img src="{{ asset('uploads/blogs/'.$blog->image) }}" alt="{{ $blog->name }}" class="w-100">
            </div>
            <h1 class="text-uppercase mb-3">{{ $blog->name }}</h1>

            <p>{!! $service->description !!}</p>
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

@endsection
