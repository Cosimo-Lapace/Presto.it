{{-- carosello --}}
<div class="container-sm mycarosel">
    <x-message/>
    <div class="divlogin d-flex justify-content-center align-items-center" id="divlogin" >
        <div class="row">
            <div class="col-sm-6 d-flex align-items-center div1carousel leftcarouselresponsive" id="div1carousel">
                <div class="col-sm-12">
                    <h3 class="mb-5 texth3head h3leftcarousel">{{__('ui.titleCarousel')}}<span class="title-carousel">{{__('ui.titleCarouselspan')}}</span>{{__('ui.titleCarouselend')}}</h3>
                    <p class="pleftcarousel testo-carousel">{{__('ui.allAnnouncements')}}</p>
                    <div class="text-center" id="divflexbottoncarousel">
                        <a href="{{route ('annunci')}}" class="mt-3 btn buttonhead effect effect-3"><i class="bi bi-hand-index-thumb">  </i></a>
                        @auth
                        @else
                        <a href="{{route ('login')}}" class="mt-3 btn buttonhead  effect effect-4 ">Accedi </i></a>
                        <a href="{{route ('register')}}" class="mt-3 btn buttonhead ms-3 effect effect-5 ">Registrati </i></a>
                        @endauth
                    </div>
                </div>
            </div>
            <div class="col-sm-6 div1carouse2 leftcarouselresponsive" id="div1carouse2">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner ">
                        <div class="carousel-item active div1carouseimg ">
                            <img src="{{asset('images/search.jpg')}}" class="d-block h-100 img-fluid " alt="...">
                        </div>
                        <div class="carousel-item  div1carouseimg">
                            <img src="{{asset('images/agreement.jpg')}}" class="d-block h-100 img-fluid " alt="...">
                        </div>
                        <div class="carousel-item div1carouseimg ">
                            <img src="{{asset('images/money.jpg')}}" class="d-block h-100 img-fluid " alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon buttoncarousel" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon buttoncarousel" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
