<x-main>
  <x-nav/>
  <div class="container-sm divads">
    <x-message/>
  <div class="d-flex justify-content-center align-items-center " >
    <div class="row">
         <div class="col-sm-12">
            <div class="exit">
              <a href="{{route ('welcome')}}" class="btn btn-outline-danger"> EXIT <i class="bi bi-arrow-right-circle-fill"></i></a>
            </div>
        </div>
         <div class="col-sm-12 text-center"> <h1 class="title">{{__('ui.pubblica')}}</h1></div>

        <div class="container-form" >
          <div class="row justify-content-center align-items-center">
            <div class="col-sm-6 mt-3">
                <form id="formaccedi" action="{{route('articles.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <label class="label" for="title">Nome del Prodotto</label>
                <input type="text" name="title" id="name" class="form-control labelborder @error('title') is-invalid @enderror">
                @error ('title') <span class="text-danger small">{{$message}}</span>@enderror
              </div>
              <div class="col-sm-6 mt-3">
                <label class="label" for="category">Categoria</label>
                  <select name="category" class="form-control labelborder">
                    @foreach ($category as $categor )
                      <option  value="{{old('category_id' ,$categor->id)}}">{{$categor->name}}</option>
                    @endforeach
                  </select>
                  </div>
                  <div class="col-sm-6 mt-3">
                  <label for="price" class="label" >Prezzo</label>
                  <input type="number" min="1" step="0.5" name="price" class="form-control labelborder" id="price">
              {{-- @error('price') is-invalid @enderror --}}
              @error ('price') <span class="text-danger small">{{$message}}</span>@enderror
                </div>
            <div class="col-sm-6 mt-3">
                <label for="body" class="label">Descrizione</label>
                <textarea type="password" name="body" class="form-control labelborder"></textarea>
                {{-- @error('body') is-invalid @enderror --}}
                @error ('body') <span class="text-danger small">{{$message}}</span>@enderror
            </div>
            <div class="col-sm-6 mt-3">
                <div>
                    <h3>Inserisci delle immagini (massimo 3)</h3>
                <i class="bi bi-arrow-up-square iconads iconinput1 pointer"> </i>
                <label for="images[]" class="label"></label>
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
            </div>
        <div class="col-sm-6 mb-3 mt-3">
              <label for="type" class="label">Tipologia</label>
                <select name="type" class="form-control labelborder">
                  <option value="vendo" id="vendo">Vendo</option>
                  <option value="cerco" id="cerco">Cerco</option>
                </select>
            </div>
            <div  class="col-sm-6 text-center mb-5">
              <button type="submit" class="btn button-filters  btn-crea" id="exampleModal">Crea Annuncio</button>
            </div>
            <div class="col-sm-12" id="previewimg">
            </div>
          </div>
        </div>

      </form>
    </div>
</div>
@vite (['resources/js/ads.js'])
</x-main>

