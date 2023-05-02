<x-main>
<x-nav/>
  <div class="container divmargin">
    <h1 class="fw-bolder text-center titolo-mieiAnnunci">{{__('ui.miei')}}</h1>
    <div class="row">
      <div class="accordion" id="accordionExample">
        @forelse ($articles as $article )
          <div class="col-12 g-3">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button footer" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{$article->id}}" aria-expanded="false" aria-controls="collapseOne">
                  {{$article->title}}
                </button>
              </h2>
              <div id="collapseOne{{$article->id}}" class="accordion-collapse footer collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <table class="table footer table-striped ">
                    <tr>
                      <th>Data Annuncio</th>
                      <th>Tipologia</th>
                    </tr>
                    <tr>
                      <td>{{$article->created_at}}</td>
                      <td> <span class="tabletype red">{{$article->type}}</span></td>
                    </tr>
                  </table>
                  <div class="col-2">
                    <h4>{{$article->title}}</h4>
                  </div>
                  <div class="row">
                    <div class="col-4">
                      {{-- passo id nel carousel per dare un riferimento che riconosce l'id del carousel richiamato  --}}
                      <div id="carouselExampleRide{{$article->id}}" class="carousel slide" data-bs-ride="true">
                        <div class="carousel-inner">
                            @forelse ( $article->images()->get() as $image )
                            @if(count($article->images()->get()) == 1)
                            <div class="">
                                <img src="{{ ($image->getUrl(1920,1080) ? $image->getUrl(1920,1080) : 'images/default-placeholder.png') }}" class="d-block w-100" alt="...">
                              </div>
                                @else
                                <div class="carousel-item carouselimagearticle">
                                    <img src="{{ ($image->getUrl(1920,1080) ? $image->getUrl(1920,1080) : 'images/default-placeholder.png') }}" class="d-block w-100" alt="...">
                                  </div>
                                @endif
                                @empty
                                <img src="{{asset('images/default-placeholder.png' )}}" class="d-block w-50 img-fluid " alt="...">
                               <p class="lead fw-normal text-muted">Non ci sono immagini</p>
                            @endforelse
                        </div>
                        @if(count($article->images()->get()) > 1)
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide{{$article->id}}" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon buttoncarouselmyannunci" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide{{$article->id}}" data-bs-slide="next">
                          <span class="carousel-control-next-icon buttoncarouselmyannunci" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                        @else
                        @endif
                      </div>
                    </div>
                    <div class="col-8">
                      <p class="text-center">{{$article->body}} </p>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                      <form action="{{route('articles.edit' , $article)}}"  >
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-white"><i class="bi bi-pencil-fill text-2 pointer me-5">Modifica</i></button>

                      </form>
                      <form action="{{route('articles.destroy' , $article)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-white"><i class="bi bi-trash3 text-1 pointer me-2">Cancella</i></button>
                      </form>


                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @empty
        @endforelse
      </div>
    </div>
  </div>
  @vite(['resources/js/carousel.js'])
</x-main>
