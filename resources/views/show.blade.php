<x-main>
   <x-nav/>

   <section class="container cont-dettagli" data-aos-once="true">
        <h1 class="text-center title-dett-ann ">{{__('ui.dettagli')}}</h1>
        <p class="lead fw-normal text-muted mb-5 text-center">{{__('ui.text-muted')}}</p>
        <div class="container">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6">
                    <div id="carouselExampleControls2" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @if(count($article->images()->get()) == 0)
                                <img src="{{asset('images/default-placeholder.png' )}}" class=" img-fluid " alt="...">
                            @else
                           
                        
                        @endif
                        @forelse ($article->images()->get() as $image )
                        @if(count($article->images()->get()) == 1)
                        <img src="{{($image->getUrl(1920,1080) ? $image->getUrl(1920,1080) : 'images/default-placeholder.png')}}" class="img-fluid">

                         @else

                        @endif
                        <div class="carousel-item carouselimagearticle">
                            <img src="{{ asset($image ? ($image->getUrl(1920,1080)) : 'public/images/default-placeholder.png') }}" class="d-block h-100 img-fluid " alt="...">
                            
                        </div>
                        @empty
                        @endforelse
                        </div>
                        @if(count($article->images()->get()) > 1)
                        <button class="carousel-control-prev " type="button" data-bs-target="#carouselExampleControls2" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon buttoncarousel" aria-hidden="true"></span>
                            <span class="visually-hidden ">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls2" data-bs-slide="next">
                            <span class="carousel-control-next-icon buttoncarousel" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        @else 
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-sm-end">
                        <form action="{{route('favorites.store',$article->id)}}" method="POST" >
                            @csrf

                        <button type="submit" class="btn btn-outline-danger" id="buttonfavorites" data-check={{$check}}><i class="bi bi-heart"></i></button>
                    </form>
                    </div>
                    <h2 class="display-5 fw-bolder dett-titolo">{{$article->title}}</h2>
                    <div class="badge bg-danger bg-gradient mb-2">{{$article->type}}</div>
                    <p class="card-text-dett mt-3">{{$article->body}}</p>
                    <div class="mb-5 prezzo">
                        <span>€ {{$article->price}}</span>
                    </div>
                    <div class="d-flex">
                        <button type="button" class="btn button-filters " data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-envelope"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

 <!-- Modal -->
<div class="divmargin modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header backgroundwhite">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Contatta Il Venditore</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body backgroundwhite">
            <table class="table footer table-striped ">
                <tr>
                  <th>Venditore</th>
                  <th>Email del venditore</th>
                </tr>
                <tr>
                  <td>{{$article->user->name}}</td>
                  <td>{{$article->user->email}}</td>
                </tr>
              </table>
        </div>
        <div class="modal-footer backgroundwhite">
          <button type="button" class="mt-3 btn button-filters" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@vite(['resources/js/show.js'])
@vite(['resources/js/carousel.js'])
</x-main>

