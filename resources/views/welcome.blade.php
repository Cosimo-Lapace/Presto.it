<x-main>
  <x-nav/>
  <x-carousel/>
  <x-filter-section :categories="$categories"/>
  <div class="container-md mt-5" data-aos="fade-right" data-aos-once="true">
    <div class="row row-cols-md-3 row-cols-xl-4 justify-content-center">
      @forelse ($articles as $article )
        <div class="col-sm-3 ms-4 mb-5 responsivemargincard">
          <div class="card h-100 card">
            @if(count($article->images()->get()) == 0)
            <img src="{{asset('images/default-placeholder.png' )}}" class="d-block w-100 img-fluid " alt="...">
        @else
        @endif
            @foreach ($article->images()->get() as $image )
            <img class="card-img-top " src="{{ asset($image->getUrl(1920,1080) ? $image->getUrl(1920,1080) : 'images/default-placeholder.png') }}" alt="..." />
              @break
            @endforeach
            <a href="{{route ('articles.show', $article)}}"><span class="spancardimg btn red">{{$article->type}}</span></a>
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
                  <div class="text-center"><a class="btn button-filters mt-auto btn-crea " href="{{route ('articles.show', $article)}}">Vai a Dettaglio</a></div>
            </div>
          </div>
        </div>
      @empty
      @endforelse
    </div>
  </div>

{{-- TEAM --}}
  <section class="page-section bg-light" id="team" data-aos="fade-left" data-aos-once="true">
    <div class="container container-team">
        <div class="text-center">
            <h2 class="section-heading text-uppercase title-team">{{__('ui.team')}}</h2>
            <p class="text-muted text-team">{{__('ui.presentationTeam')}}</p>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="{{ asset( 'images/CosimoLapace.jpeg') }}" class="img-fluid" alt="CosimoLapace" />
                    <h4 class="member">Cosimo Lapace</h4>
                    <p class="text-muted">Full Stack Developer Junior</p>
                    <a class="btn icons-links icons-links2 mx-2 border-0" href="https://www.facebook.com/cosimo.lapace/"><i class="bi bi-facebook"></i></a>
                    <a class="btn icons-links icons-links2 mx-2 border-0" href="https://github.com/CosimoLP"><i class="bi bi-github"></i></i></a>
                    <a class="btn icons-links icons-links2  mx-2 border-0" href="https://www.linkedin.com/in/cosimo-lapace-89ab32194"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="{{ asset( 'images/AnnalisaPorcelli.jpg') }}" class="img-fluid" alt="AnnalisaPorcelli" />
                    <h4 class="member">Annalisa Porcelli</h4>
                    <p class="text-muted">Full Stack Developer Junior</p>
                    <a class="btn icons-links icons-links2 mx-2 border-0" href="https://www.facebook.com/annalisaporcelli5"><i class="bi bi-facebook"></i></i></a>
                    <a class="btn icons-links icons-links2  mx-2 border-0" href="https://github.com/Annalisa-Porcelli"><i class="bi bi-github"></i></a>
                    <a class="btn icons-links icons-links2  mx-2 border-0" href="https://www.linkedin.com/in/annalisa-porcelli-a57574234/"><i class="bi bi-linkedin"></i></i></a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="{{ asset( 'images/GiuseppeBuscemi.jpeg') }}" class="img-fluid" alt="GiuseppeBuscemi" />
                    <h4 class="member">Giuseppe Buscemi</h4>
                    <p class="text-muted">Full Stack Developer Junior</p>
                    <a class="btn icons-links icons-links2  mx-2 border-0" href="https://www.facebook.com/giuseppe.buscemi.92"><i class="bi bi-facebook"></i></i></a>
                    <a class="btn icons-links icons-links2 mx-2 border-0" href="https://github.com/Giuseppe-Buscemi95"><i class="bi bi-github"></i></i></a>
                    <a class="btn icons-links icons-links2 mx-2 border-0" href="https://www.linkedin.com/in/giuseppe-buscemi-8a1b1121b/"><i class="bi bi-linkedin"></i></i></a>
                </div>
            </div>
        </div>
    </div>
  </section>

  <x-footer/>


  @vite(['resources/js/filter.js'])
</x-main>
