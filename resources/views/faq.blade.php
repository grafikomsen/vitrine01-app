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
                        <a class="nav-link px-2 fw-bold active" href="{{ route('faq') }}">Faqs</a>
                    </li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="section-2  py-5">
        <div class="container py-2">
            <div class="row">
                <div class="col-md-12 py-4">
                    <div class="accordion" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    What does LOREM mean?
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum vitae, doloremque quaerat atque libero possimus veniam labore nam sint, expedita autem eius in? Perferendis, commodi reprehenderit eaque porro magnam similique! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias in quisquam dignissimos omnis a perferendis, animi, eligendi quo labore rem quas. Accusamus quidem rem consequatur vero culpa nostrum, assumenda exercitationem. </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                    Where can I subscribe to your newsletter?
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum vitae, doloremque quaerat atque libero possimus veniam labore nam sint, expedita autem eius in? Perferendis, commodi reprehenderit eaque porro magnam similique! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias in quisquam dignissimos omnis a perferendis, animi, eligendi quo labore rem quas. Accusamus quidem rem consequatur vero culpa nostrum, assumenda exercitationem. </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                    Can I order a free copy of a magazine to sample?
                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum vitae, doloremque quaerat atque libero possimus veniam labore nam sint, expedita autem eius in? Perferendis, commodi reprehenderit eaque porro magnam similique! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias in quisquam dignissimos omnis a perferendis, animi, eligendi quo labore rem quas. Accusamus quidem rem consequatur vero culpa nostrum, assumenda exercitationem. </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-headingFour">
                                    Are you on Twitter, Facebook and other social media platforms?
                                </button>
                            </h2>
                            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum vitae, doloremque quaerat atque libero possimus veniam labore nam sint, expedita autem eius in? Perferendis, commodi reprehenderit eaque porro magnam similique!</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-headingFour">
                                    Do I need to create an account to make an order?
                                </button>
                            </h2>
                            <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum vitae, doloremque quaerat atque libero possimus veniam labore nam sint, expedita autem eius in? Perferendis, commodi reprehenderit eaque porro magnam similique!</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-helper bg-primary py-5 text-center">
        <div class="container">
           <div class="help-container">
                <h1 class="title text-white">Do you need help?</h1>
                <p class="card-text text-white mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi ipsum, odit velit exercitationem praesentium error id iusto dolorem expedita nostrum eius atque? Aliquam ab reprehenderit animi sapiente quasi, voluptate dolorum?</p>
                <a href="{{ route('contact') }}" class="btn btn-primary fw-bold rounded-0 px-4 mt-3">Contactez-nous maintenant <i class="ps-2 fa-solid fa-angle-right"></i></a>
           </div>
        </div>
    </section>

@endsection
