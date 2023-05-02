<x-main>
  <x-nav />

  <div class="container-sm divads ">
    <x-message />
    <div class="d-flex justify-content-center align-items-center ">
      <div class="row">
        <div class="col-sm-12">
          <div class="exit">
            <a href="{{route ('welcome')}}" class="btn btn-outline-danger"> EXIT <i
                class="bi bi-arrow-right-circle-fill"></i></a>
          </div>
          <div class="col-sm-12 text-center">
            <h1 class="title">MODIFICA IL TUO ANNUNCIO</h1>
          </div>
          <form id="formaccedi" action="{{route('articles.update' , $article)}}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="container container-form">
              <div class="row justify-content-center align-items-center">
                <div class="col-sm-6 mt-3">
                  <label class="label" for="title">Nome del Prodotto</label>
                  <input type="text" name="title" id="name" value="{{$article->title}}"
                    class="form-control  @error('title') is-invalid @enderror">
                  @error ('title') <span class="text-danger small">{{$message}}</span>@enderror
                </div>
                <div class="col-sm-6 mt-3">
                  <label class="label" for="category">Categoria</label>
                  <select name="category_id" class="form-control">
                      @foreach ($category as $categ )
                          @if ($categ->id == $article->category_id)
                              <option value="{{$categ->id}}" selected>{{$categ->name}}</option>
                          @else
                              <option value="{{$categ->id}}">{{$categ->name}}</option>
                          @endif
                      @endforeach
                  </select>
                </div>
                <div class="col-sm-6 mt-3">
                  <label for="price" class="label">Prezzo</label>
                  <input type="number" min="1" step="0.5" name="price" class="form-control" value="{{$article->price}}"
                    id="price">
                  @error ('price') <span class="text-danger small">{{$message}}</span>@enderror
                </div>
                <div class="col-sm-6 mt-3">
                  <label for="body" class="label">Descrizione</label>
                  <textarea type="text" name="body" class="form-control">{{ old('body' , $article->body) }}</textarea>

                  @error ('body') <span class="text-danger small">{{$message}}</span>@enderror

                </div>

                <div class="col-sm-6 mt-3" id="divinput">
                    <h3>Inserisci delle immagini (massimo 3)</h3>
                    @forelse ($article->images()->get() as $key => $image )
                    <p style="display: none" class="urlimage">{{$image->getUrl(1920,1080)}}</p>
                    @vite (['resources/js/edit.js'])
                    @empty
                    @vite(['resources/js/ads.js'])
                    <div>
                      <i class="bi bi-arrow-up-square iconads iconinput1 pointer"> </i>
                      <label for="image" class="label"></label>
                      <input type="file" name="image" id="image1" class="form-control" style="display: none">
                      <span class="spaniconads1"></span>
                    </div>
                    <div>
                      <label for="image2" class="label"></label>
                      <i class="bi bi-plus-square iconads iconinput2 pointer"> </i>
                      <input type="file" name="image2" id="image2" class="form-control" style="display: none">
                      <span class="spaniconads2"></span>
                    </div>
                    <div>
                      <label for="image3" class="label"></label>
                      <i class="bi bi-plus-square iconads iconinput3 pointer"> </i>
                      <input type="file" name="image3" id="image3" class="form-control" style="display: none">
                      <span class="spaniconads3"></span>
                    </div>
                    @endforelse
                  </div>

            <div class="col-sm-6 mb-3 mt-3">
              <label for="type" class="label">Tipologia</label>
              <select name="type" class="form-control">
                @if ($article->type == 'vendo')
                <option value="vendo" id="vendo" selected>Vendo</option>
                <option value="cerco" id="cerco">Cerco</option>
                @else
                <option value="cerco" id="cerco" selected>Cerco</option>
                <option value="vendo" id="vendo">Vendo</option>
                @endif
              </select>
            </div>
            <div class="col-sm-6 text-center mb-5">
              <button type="submit" class="btn button-filters  btn-crea" id="submit">Modifica annuncio</button>
            </div>
          </form>
        </div>

        <div class="col-sm-12" id="previewimg">
          @forelse ($article->images()->get() as $key => $image )
          <form action="{{route('images.destroy',$image->id)}}" method="POST" id="formdestroy{{$key++}}">
            @csrf
            @method('DELETE')
            <label for="image_ids[]" class="label"></label>
            <input type="hidden" name="image_ids[]" value="{{ $image->id }}">

            <span class="spaniconads1">

            </span>

          </form>

          @empty
          @endforelse
        </div>
        </div>

    </div>
  </div>

</x-main>
