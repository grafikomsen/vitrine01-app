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
                        <a class="nav-link px-2 fw-bold active" href="{{ route('projets') }}">Nos réalisations</a>
                    </li>
                </ol>
            </nav>
        </div>
    </section>

@endsection
