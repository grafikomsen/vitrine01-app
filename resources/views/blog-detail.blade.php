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

            <p>{{ $blog->description }}</p>
        </div>
    </section>

    <section class="section-helper bg-primary py-5 text-center my-3">
        <div class="container">
           <div class="help-container">
                <h1 class="title text-white">Do you need help?</h1>
                <p class="card-text text-white mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi ipsum, odit velit exercitationem praesentium error id iusto dolorem expedita nostrum eius atque? Aliquam ab reprehenderit animi sapiente quasi, voluptate dolorum?</p>
                <a href="#" class="btn btn-primary rounded-0 px-4 mt-3">Contactez-nous maintenant <i class="ps-2 fa-solid fa-angle-right"></i></a>
           </div>
        </div>
    </section>

    <section class="section-2  py-5">
        <div class="container py-2">
            <h1 class="mb-3">NOS FAQS</h1>
            <div class="row">
                <div class="col-md-12 py-4">
                    <div class="accordion" id="accordionFlushExample">
                        @if ($faqs->isNotEmpty())
                            @foreach ($faqs as $key => $faq)
                            <div class="accordion-item rounded-1 shadow-sm mb-2">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-{{ $key }}" aria-expanded="false" aria-controls="flush-{{ $key }}">
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
