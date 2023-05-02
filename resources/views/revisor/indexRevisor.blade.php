<x-main>
    <x-nav/>
    <section class="container  cont-revisionare">
        <h1 class="fw-bolder text-center titolo-revisore">{{ $check ?  'ELEMENTO DA REVISIONARE'  : 'Non ci sono annunci da revisionare ... ' }}</h1>
        <div class="d-flex justify-content-center align-items-center">
            @if ($check)
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div id="carouselExampleControls{{$check->id}}" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($check->images()->get() as $image )
                                <div class="carousel-item active carouselimagearticle">
                                    <img src="{{ asset($image->getUrl(1920,1080) ? $image->getUrl(1920,1080) : 'images/default-placeholder.png') }}" class="d-block h-100 img-fluid " alt="...">
                                </div>
                                @endforeach

                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls{{$check->id}}" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon buttoncarousel" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls{{$check->id}}" data-bs-slide="next">
                                    <span class="carousel-control-next-icon buttoncarousel" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 align-items-center">
                        <h3 class="dett-titolo">{{$check->title}}</h3>
                        <p class="card-text">{{$check->body}}</p>
                        <p>{{$check->category->name}}</p>
                        <p class="prezzo">€ {{$check->price}}</p>
                        <p><span class="spantype btn red">{{$check->type}}</span></p>

                        <table class="bottoni">
                            <tr>
                                <td>
                                    <form action="{{route('accepted', [ 'article' => $check ])}}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-lg btn-outline-success me-3"> Accetta</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{route('decline' , ['article' => $check])}}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-lg btn-outline-danger"> Rifiuta</button>
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            @endif
            @if (isset($image))
            <table class="revisor-img mt-5">
                <td class="text-center p-3">
                    <h1 class="d-flex align-items-center dett-titolo">Revisione delle Immagini</h1>
                    <h2 class="text-muted">Tags:
                        <p>

                                @foreach ( $image->labels as $label )
                                    <p class="d-inline">{{$label}}</p>
                                @endforeach

                        </p>
                    </h2>
                    <small class="revisorimg-input">Adult:</small>
                    <span class="{{$image->adult}}"></span>
                    <br>
                    <small class="revisorimg-input">Spoof:</small>
                    <span class="{{$image->spoof}}"></span>
                    <br>
                    <small class="revisorimg-input">Medical:</small>
                    <span class="{{$image->medical}}"></span>
                    <br>
                    <small class="revisorimg-input">Violence:</small>
                    <span class="{{$image->violence}}"></span>
                    <br>
                    <small class="revisorimg-input">Reacty:</small>
                    <span class="{{$image->racy}}"></span>
                </td>
            </table>
            @endif
        </div>
    </section>
    @vite(['resources/js/carousel.js'])
    @vite(['resources/js/app.js'])
</x-main>




