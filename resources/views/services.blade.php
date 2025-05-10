@extends('layouts.app')
@section('main')

    <section class="Breadcrumb bg-primary py-4">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item">
                        <a class="nav-link px-2 fw-bold text-white" href="{{ route('home') }}">Acceuil</a>
                    </li>
                    <span class="text-white fw-bold">/</span>
                    <li class="fw-bold active" aria-current="page">
                        <a class="nav-link px-2 fw-bold active" href="{{ route('services') }}">Services</a>
                    </li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="bg-light py-5">
        <div class="container">
            <h1 class="mb-3">NOS SERVICES</h1>
            <div class="row">
                @if ($services->isNotEmpty())
                    @foreach ($services as $service)
                    <div class="col-sm-12 col-md-4 col-lg-4 mb-4">
                        <div class="card h-100 rounded-1 border-0 shadow-sm">
                            @if (!empty($service->image))
                                <img class="bd-placeholder-img rounded-0 p-2" src="{{ asset('uploads/services/'.$service->image) }}" alt="{{ $service->name }}"/>
                            @endif
                            <div class="card-body">
                                <h5 class="card-title fs-5 text-uppercase fw-bold">{{ $service->name }}</h5>
                                <p class="card-text">{!! $service->short_desc !!}</p>
                                <a href="{{ route('serviceDetail',$service->slug) }}" class="btn btn-primary fw-bold rounded-1 px-3">En savoir plus <i class="ps-2 fa-solid fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

@endsection
