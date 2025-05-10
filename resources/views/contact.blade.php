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
                    <div class="container">
                        <div class="row align-items-center d-flex">
                            <div class="col-md-12">
                                <div class="block text-center">
                                    <span class="text-uppercase text-sm letter-spacing"></span>
                                    <h1 class="my-3 text-uppercase text-center">Contactez - nous</h1>
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

                <div class="col-12 col-md-12 mt-lg-0">
                    <div class="card card-body bg-primary rounded-1 shadows py-4 text-center h-100 border-0">
                        <!-- Title -->
                        <h5 class="text-white fw-bolder mb-3">NOS INFORMATIONS DE CONTACT</h5>
                        <ul class="list-inline d-grid align-content-center justify-content-center mb-0">
                            <!-- Address -->
                            <li class="list-item mb-3">
                                <a href="#" class="nav-link text-white">
                                    <i class="fas fa-fw fa-map-marker-alt me-2 mt-1"></i>
                                    {{ getSettings()->address }}
                                </a>
                            </li>
                            <!-- Phone number -->
                            <li class="list-item mb-3">
                                <a href="#" class="nav-link text-white">
                                    <i class="fas fa-fw fa-phone me-2"></i>
                                    {{ getSettings()->phone }}
                                </a>
                            </li>
                            <!-- Email id -->
                            <li class="list-item mb-0">
                                <a href="#" class="nav-link text-white">
                                    <i class="far fa-fw fa-envelope me-2"></i>
                                    {{ getSettings()->email }}
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
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row g-4 g-lg-0">
                <div class="col-12 col-md-6 p-4">
                    <iframe class="w-100 h-100 grayscale rounded-1" src="{{ getSettings()->url_googleMaps }}" height="500" style="border:0;" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <div class="col-12 col-md-6 p-4">
                    <!-- Contact form START -->
                    <!-- Title -->
                    <h3 class="fw-bolder">DEMANDE DE DEVIS GRATUIT</h3>
                    <p>Demandez votre devis de nettoyage en remplissant le formulaire ci-après. Pour plus d'informations, vous pouvez également contacter notre société de nettoyage. Nous saurons vous conseiller les prestations les plus adaptées à vos besoins, et nous définirons avec vous la périodicité de nos interventions, ponctuelles ou régulières.</p>

                    <form action="{{ route('sentFormContact') }}" method="POST" name="sentFormContact" id="sentFormContact">
                        @csrf
                        <!-- Name -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4 bg-light-input">
                                    <label for="first_name" class="form-label">Votre prénom *</label>
                                    <input type="text" value="{{ old('first_name') }}" class="form-control rounded-1 @error('first_name') is-invalid @enderror rounded-0" placeholder="votre prénom" id="first_name" name="first_name">
                                    <p class="first_name-error invalid-feedback"></p>
                                    @if ('first_name')
                                        <p class="invalid-feedback text-danger"></p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4 bg-light-input">
                                    <label for="last_name" class="form-label">Votre nom *</label>
                                    <input type="text" value="{{ old('last_name') }}" class="form-control rounded-1 @error('last_name') is-invalid @enderror rounded-0" placeholder="votre nom" id="last_name" name="last_name">
                                    <p class="last_name-error invalid-feedback"></p>
                                    @if ('last_name')
                                        <p class="invalid-feedback text-danger"></p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4 bg-light-input">
                                    <label for="phone" class="form-label">Votre n° de Tél *</label>
                                    <input type="text"value="{{ old('phone') }}" class="form-control rounded-1 @error('phone') is-invalid @enderror rounded-0" placeholder="votre numéro de téléphone" id="phone" name="phone">
                                    <p class="phone-error invalid-feedback"></p>
                                    @if ('phone')
                                        <p class="invalid-feedback text-danger"></p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4 bg-light-input">
                                    <label for="email" class="form-label">Votre adresse mail *</label>
                                    <input type="email"value="{{ old('email') }}" class="form-control rounded-1 @error('email') is-invalid @enderror rounded-0" placeholder="votre e-mail" id="email" name="email">
                                    <p class="email-error invalid-feedback"></p>
                                </div>
                                @if ('email')
                                    <p class="invalid-feedback text-danger"></p>
                                @endif
                            </div>
                        </div>

                        <!-- Message -->
                        <div class="mb-4 bg-light-input">
                            <label for="subjet" class="form-label">Services *</label>
                            <select value="{{ old('subject') }}" class="form-control rounded-1  @error('subject') is-invalid @enderror rounded-0" placeholder="Choisissez un service" name="subjet" id="subjet">
                                <option > --- Selectionnez un service --- </option>
                                <option value="Nettoyages professionel et industriel">Nettoyages professionel et industriel</option>
                                <option value="Nettoyage fin de chantier">Nettoyage fin de chantier</option>
                                <option value="Dératisantion">Dératisantion</option>
                                <option value="Désinfection">Désinfection</option>
                                <option value="Désintisation">Désintisation</option>
                                <option value="Shampouinage moquette">Shampouinage moquette</option>
                                <option value="Nettoyage salon">Nettoyage salon</option>
                                <option value="Nettoyage matelas">Nettoyage matelas</option>
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
                url: "{{ route('sentFormContact') }}",
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
