<x-main>
    <x-nav/>
    <x-message/>
    <div class="container-sm coursel-lavora mycarosel">
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="{{ asset( '/images/a4c9d3dc48b543c6abd03fb8ffa4ed7e.jpeg') }}" class="d-block w-100" style="opacity: 60%">
                <div class="carousel-caption d-none d-md-block">
                <h1 class="text-work">{{__('ui.carouselWork')}}</h1>
                <p class="text-carousel">{{__('ui.carouselText')}}</p>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="{{ asset( '/images/a4c9d3dc48b543c6abd03fb8ffa4ed7e.jpeg') }}" class="d-block w-100" style="opacity: 60%">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="text-work">{{__('ui.carouselWork')}}</h1>
                    <p class="text-carousel">{{__('ui.carouselText')}}</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset( '/images/a4c9d3dc48b543c6abd03fb8ffa4ed7e.jpeg') }}" class="d-block w-100" style="opacity: 60%">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="text-work">{{__('ui.carouselWork')}}</h1>
                    <p class="text-carousel">{{__('ui.carouselText')}}</p>
                </div>
            </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon buttoncarousel" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon buttoncarousel" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="container py-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col col-xl-10 ">
                <div class="card-revisor" style="border-radius: 1rem;">
                    <div class="p-4 p-lg-5 text-center">
                        <form action="{{route('update')}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <span class="h1 fw-bold richiedi">{{__('ui.workTeam')}}</span>
                            </div>
                            <div class="col-sm-6 mb-4 form-revisor">
                                <label class="form-label label" for="name">{{__('ui.Nome')}}</label>
                                <input type="name" name="name" id="name" class="form-control form-control-lg labelborder" value="{{auth()->user()->name}}" placeholder="inserisci il tuo nome"/>
                                @error('name') <span class="text-danger small">{{$message}}</span> @enderror
                            </div>
                            <div class="col-sm-6 mb-4 form-revisor">
                                <label class="form-label label" for="email">Email</label>
                                <input type="email" name="email" id="email" value="{{auth()->user()->email}}" class="form-control form-control-lg labelborder" placeholder="inserisci la tua email"/>
                                @error('email') <span class="text-danger small">{{$message}}</span> @enderror
                            </div>
                            <div class="col-sm-6 mb-4 form-revisor">
                                <label class="label" for="description" id="description">{{__('ui.presentazione')}}</label>
                                <textarea name="description" rows="10" class="form-control labelborder"></textarea>
                                @error('description') <span class="text-danger small">{{$message}}</span> @enderror
                            </div>
                            <div class="pt-4 mb-4">
                                <button class="btn btn-lg button-filters" type="sumbit">{{__('ui.invia')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h1 class="mt-5 text-center title-team">{{__('ui.vantaggiTeam')}}</h1>
    <section data-aos="fade-right" data-aos-once="true">
        <div class="container text-center text-md-start mt-5">
            <div class="row mt-3">
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <div class="img-icone"><i class="bi bi-person-workspace"></i></div>
                    <h2 class="vantaggi">{{__('ui.Smartworking')}}</h2>
                    <p class="testo">
                       {{__('ui.textSmartworking')}}
                    </p>
                </div>
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <div class="img-icone"><i class="bi bi-hourglass-split"></i></div>
                    <h2 class="vantaggi">{{__('ui.Flessibilità')}}</h2>
                    <p class="testo">
                       {{__('ui.textFlessibilità')}}
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section data-aos="fade-left" data-aos-once="true">
        <div class="container text-center text-md-start mt-5">
            <div class="row mt-3">
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <div class="img-icone"><i class="bi bi-emoji-wink-fill"></i></div>
                    <h2 class="vantaggi">{{__('ui.Bonus')}}</h2>
                    <p class="testo">
                       {{__('ui.bonusAmico')}}
                    </p>
                </div>
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <div class="img-icone"><i class="bi bi-star-fill"></i></div>
                    <h2 class="vantaggi">{{__('ui.Welcome')}}</h2>
                    <p class="testo">
                        {{__('ui.borad')}}
                    </p>
                </div>
            </div>
        </div>
    </section>
    <x-footer/>
</x-main>
