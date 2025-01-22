@extends('layouts.app')
@section('main')

    <section class="Breadcrumb py-5">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item">
                        <a class="nav-link px-2 fw-bold text-white" href="{{ route('home') }}">Acceuil</a>
                    </li>
                    <span class="text-white fw-bold">/</span>
                    <li class="fw-bold active" aria-current="page">
                        <a class="nav-link px-2 fw-bold active" href="{{ route('contact') }}">Contact</a>
                    </li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="hero-small">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" style="background-image: url('images/banner1.jpg') ;">
                    <div class="hero-small-background-overlay"></div>
                    <div class="container  h-100">
                        <div class="row align-items-center d-flex h-100">
                            <div class="col-md-12">
                                <div class="block text-center">
                                    <span class="text-uppercase text-sm letter-spacing"></span>
                                    <h1 class="my-3 text-uppercase text-center">Contactez - nous</h1>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-info" >
        <div class="container contact-box">
            <!-- Contact info box -->
            <div class="row g-4 g-md-5 mt-0 mt-lg-3">
                <!-- Box item -->
                <div class="col-lg-4 mt-lg-0">
                    <div class="card card-body bg-primary rounded-1 shadows py-5 text-center h-100 border-0">
                        <!-- Title -->
                        <h5 class="text-white fw-bolder mb-3">Customer Support</h5>
                        <ul class="list-inline mb-0">
                            <!-- Address -->
                            <li class="list-item mb-3">
                                <a href="#" class="nav-link text-white">
                                    <i class="fas fa-fw fa-map-marker-alt me-2 mt-1"></i>
                                    Example Cop.  Park Street, MI 2222
                                </a>
                            </li>
                            <!-- Phone number -->
                            <li class="list-item mb-3">
                                <a href="#" class="nav-link text-white">
                                    <i class="fas fa-fw fa-phone me-2"></i>
                                    (XXX) XXX-XXXX
                                </a>
                            </li>
                            <!-- Email id -->
                            <li class="list-item mb-0">
                                <a href="#" class="nav-link text-white">
                                    <i class="far fa-fw fa-envelope me-2"></i>
                                    example@email.com
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Box item -->
                <div class="col-lg-4 mt-lg-0">
                    <div class="card card-body rounded-1 shadow py-5 text-center h-100 border-0">
                        <!-- Title -->
                        <h5 class="mb-3  fw-bolder">Contact Address</h5>
                        <ul class="list-inline mb-0">
                            <!-- Address -->
                            <li class="list-item mb-3 h6 fw-light">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-fw fa-map-marker-alt me-2 mt-1">
                                    </i>Example Cop.  Park Street, MI 22222
                                </a>
                            </li>
                            <!-- Phone number -->
                            <li class="list-item mb-3 h6 fw-light">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-fw fa-phone me-2">
                                    </i>+XXX-XXX-XXX
                                </a>
                            </li>
                            <!-- Email id -->
                            <li class="list-item mb-0 h6 fw-light">
                                <a href="#" class="nav-link">
                                    <i class="far fa-fw fa-envelope me-2">
                                    </i>example@email.com
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Box item -->
                <div class="col-lg-4 mt-lg-0">
                    <div class="card card-body rounded-1 shadow py-5 text-center h-100 border-0">
                        <!-- Title -->
                        <h5 class="mb-3 fw-bolder">Main Office Address</h5>
                        <ul class="list-inline mb-0">
                            <!-- Address -->
                            <li class="list-item mb-3 h6 fw-light">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-fw fa-map-marker-alt me-2 mt-1"></i>
                                    Example Cop.  Park Street, MI 22222
                                </a>
                            </li>
                            <!-- Phone number -->
                            <li class="list-item mb-3 h6 fw-light">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-fw fa-phone me-2"></i>
                                    (XXX) XXX-XXXX
                                </a>
                            </li>
                            <!-- Email id -->
                            <li class="list-item mb-0 h6 fw-light">
                                <a href="#" class="nav-link">
                                    <i class="far fa-fw fa-envelope me-2"></i>
                                    example@email.com
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="form-contact">
        <div class="container my-5">
            <div class="row g-4 g-lg-0">
                <div class="col-12 col-md-6 p-4">
                    <iframe class="w-100 h-100 grayscale rounded-1" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.9663095343008!2d-74.00425878428698!3d40.74076684379132!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259bf5c1654f3%3A0xc80f9cfce5383d5d!2sGoogle!5e0!3m2!1sen!2sin!4v1586000412513!5m2!1sen!2sin" height="500" style="border:0;" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <div class="col-12 col-md-6 p-4">
                    <!-- Contact form START -->

                    <!-- Title -->
                    <h2 class="mt-4 mt-md-4">Let's talk</h2>
                    <p>To request a quote or want to meet up for coffee, contact us directly or fill out the form and we will get back to you promptly</p>

                    <form action="{{ route('sentFormContact') }}" method="POST" name="sentFormContact" id="sentFormContact">
                        @csrf
                        <!-- Name -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4 bg-light-input">
                                    <label for="first_name" class="form-label">Votre prénom *</label>
                                    <input type="text" value="{{ old('first_name') }}" class="form-control rounded-1 @error('first_name') is-invalid @enderror rounded-0" id="first_name" name="first_name">
                                    <p class="first_name-error invalid-feedback"></p>
                                    @if ('first_name')
                                        <p class="invalid-feedback text-danger"></p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4 bg-light-input">
                                    <label for="last_name" class="form-label">Votre nom *</label>
                                    <input type="text" value="{{ old('last_name') }}" class="form-control rounded-1 @error('last_name') is-invalid @enderror rounded-0" id="last_name" name="last_name">
                                    <p class="last_name-error invalid-feedback"></p>
                                    @if ('last_name')
                                        <p class="invalid-feedback text-danger"></p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4 bg-light-input">
                                    <label for="phone" class="form-label">Votre n° de Tél *</label>
                                    <input type="text"value="{{ old('phone') }}" class="form-control rounded-1 @error('phone') is-invalid @enderror rounded-0" id="phone" name="phone">
                                    <p class="phone-error invalid-feedback"></p>
                                    @if ('phone')
                                        <p class="invalid-feedback text-danger"></p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4 bg-light-input">
                                    <label for="email" class="form-label">Votre adresse mail *</label>
                                    <input type="email"value="{{ old('email') }}" class="form-control rounded-1 @error('email') is-invalid @enderror rounded-0" id="email" name="email">
                                    <p class="email-error invalid-feedback"></p>
                                </div>
                                @if ('email')
                                    <p class="invalid-feedback text-danger"></p>
                                @endif
                            </div>
                        </div>

                        <!-- Message -->
                        <div class="mb-4 bg-light-input">
                            <label for="subjet" class="form-label">Objet *</label>
                            <select value="{{ old('subject') }}" class="form-control rounded-1  @error('subject') is-invalid @enderror rounded-0" name="subjet" id="subjet">
                                <option >--- Selectionnez ---</option>
                                <option value="">Création Web</option>
                                <option value="">Création Mobile</option>
                                <option value="">Cybersécurité</option>
                                <option value="">Reférencement naturel</option>
                                <option value="">Marketing digital</option>
                                <option value="">Branding</option>
                            </select>
                            <p class="subjet-error invalid-feedback"></p>
                            @if ('subjet')
                                <p class="invalid-feedback text-danger"></p>
                            @endif
                        </div>

                        <!-- Message -->
                        <div class="mb-4 bg-light-input">
                            <label for="message" class="form-label">Message *</label>
                            <textarea class="form-control rounded-1  @error('message') is-invalid @enderror rounded-0" id="message" name="message" rows="4">{{ old('message') }}</textarea>
                            <p class="message-error invalid-feedback"></p>
                            @if ('message')
                                <p class="invalid-feedback text-danger"></p>
                            @endif
                        </div>
                        <!-- Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-lg btn-primary mb-0 rounded-1">Soumettez votre demande</button>
                        </div>
                    </form>
                    <!-- Contact form END -->
                </div>
            </div>
        </div>
    </section>

@endsection

@section('frontJs')
    <script>
       $('#sentFormContact').submit(function(event){
            event.preventDefault();

            $("button[type='submit']").prop('disabled',true);
            $.ajax({
                url: "",
                type: 'POST',
                dataType: 'json',
                data: $('#sentFormContact').serializeArray(),
                success: function (response) {
                    $("button[type='submit']").prop('disabled',false);
                    if (response.status == 200) {
                        //window.location.href = "{{ route('contact') }}";
                        if (response.errors.first_name) {
                            $("#first_name").addClass('is-invalid');
                            $("#first_name-error").html(response.errors.first_name);
                        } else {
                            $("#first_name").html('');
                            $("#first_name-error").removeClass('is-invalid');
                        }

                        if (response.errors.last_name) {
                            $("#last_name").addClass('is-invalid');
                            $("#last_name-error").html(response.errors.last_name);
                        } else {
                            $("#last_name").html('');
                            $("#last_name-error").removeClass('is-invalid');
                        }

                        if (response.errors.phone) {
                            $("#phone").addClass('is-invalid');
                            $("#phone-error").html(response.errors.phone);
                        } else {
                            $("#phone").html('');
                            $("#phone-error").removeClass('is-invalid');
                        }

                        if (response.errors.email) {
                            $("#email").addClass('is-invalid');
                            $("#email-error").html(response.errors.email);
                        } else {
                            $("#email").html('');
                            $("#email-error").removeClass('is-invalid');
                        }

                        if (response.errors.subjet) {
                            $("#subjet").addClass('is-invalid');
                            $("#subjet-error").html(response.errors.subjet);
                        } else {
                            $("#subjet").html('');
                            $("#subjet-error").removeClass('is-invalid');
                        }

                        if (response.errors.message) {
                            $("#message").addClass('is-invalid');
                            $("#message-error").html(response.errors.message);
                        } else {
                            $("#message").html('');
                            $("#message-error").removeClass('is-invalid');
                        }

                    } else {
                        $('.name-error').html(response.errors.name);
                    }*/
                }
            });
        });
    </script>
@endsection
