<x-main>
  <x-nav/>

    <h1 class="fw-bolder text-center annunci-card titolo-revisore">{{__('ui.tutti-annunci')}}</h1>
    <p class="lead fw-normal text-muted mt-5 text-center">{{__('ui.text-annunci')}}</p>


  <section class=" sectionannunci mt-5">
    <div class="container-fluid  cont-annunci">
      <div class="row filter-annunci">
        <x-filtro_annunci :categories="$categories"/>
        <div class="col-sm-9">
            <div class="row row-cols-md-3 row-cols-xl-4 justify-content-center">
          @forelse ($articles as $article )
            <div class="col-sm-3 ms-4 mb-5 cardresponsive">
              <div class="card h-100">
                @if(count($article->images()->get()) == 0)
                <img src="{{asset('images/default-placeholder.png' )}}" class="d-block w-100 img-fluid " alt="...">
                <span class="spancardimg btn red">{{$article->type}}</span>
                @else
            @endif
              @foreach ($article->images()->get() as $image )
                <img class="card-img-top" src="{{ asset($image->getUrl(1920,1080) ? $image->getUrl(1920,1080) : 'images/default-placeholder.png') }}" alt="..." />

                <span class="spancardimg btn red">{{$article->type}}</span>
                @break
              @endforeach

              <div class="card-body-1">
                <div class="text-center">
                  <h5 class="fw-bolder  card-titolo">{{$article->title}}</h5>
                  <div class="mt-3 mb-3 ps-3 text-start prezzo"> € {{$article->price}}</div>
                  <p class="card-text ps-2 pb-3">{{$article->body}}</p>
                </div>
                <hr>
                <div class="card-text  mb-5 opacity-50 text-center">
                  <span>{{$article->categories}}</span>
                  <span>{{$article->created_at}}</span>
                </div>
                <div class="text-center"><a class="btn button-filters mt-auto btn-crea" href="{{route ('articles.show', $article)}}">Vai a Dettaglio</a></div>
              </div>
            </div>
          </div>
          @empty
          @endforelse
          <div class="mt-5">
            {{ $articles->links() }}
          </div>
        </div>
      </div>
    </div>
  </section>
  @vite(['resources/js/annunci.js'])
  @vite(['resources/js/filter.js'])
</x-main>
