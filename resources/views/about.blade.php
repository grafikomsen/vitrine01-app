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
                        <a class="nav-link px-2 fw-bold active" href="{{ route('about') }}">A propos de</a>
                    </li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="about bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 mb-3">
                    <h2 class="fs-1 text-uppercase py-2">{{ $pages->name }}</h2>
                    <p>{{ $pages->content }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-6 mb-3">
                    <img src="{{ asset('uploads/pages/'.$pages->image) }}" class="img-thumbnail border-0 shadow-sm py-2" alt="{{ $pages->name }}">
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light p-5 team">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-7">
                    <h2 class="text-center fw-bold pb-4">NÔTRE ÉQUIPE</h2>
                    <p class="text-center">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                        Ipsum adipisci praesentium quae magnam ullam totamriam, inventore
                        cupiditate possimus non dolore tempora!
                    </p>
                </div>
            </div>

            <div class="row">
                @if($teams->isNotEmpty())
                    @foreach ($teams as $team)
                        <div class="col-sm-12 col-md-3 col-lg-3">
                            <div class="card shadow-sm border-0">
                                <img src="{{ asset('uploads/teams/'.$team->image) }}" class="img-thumbnail border-0" alt="{{ $team->name }}">
                                <div class="card-body">
                                    <h5 class="text-center">{{ $team->name }}</h5>
                                    <p class="card-text text-center">{{ $team->designation }}</p>
                                    <div class="text-center">
                                        <a href="#"><i class="fa-brands fa-facebook bg-primary p-2 text-white rounded-5 fw-bold"></i></a>
                                        <a href="#"><i class="fa-brands fa-instagram bg-primary p-2 text-white rounded-5 fw-bold"></i></a>
                                        <a href="#"><i class="fa-brands fa-twitter bg-primary p-2 text-white rounded-5 fw-bold"></i></a>
                                        <a href="#"><i class="fa-brands fa-linkedin bg-primary p-2 text-white rounded-5 fw-bold"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

@endsection
