<div class="col-sm-2 cont-offcanvas cont-offcanvasright filters">
    <form action="{{route('search.simple')}}" method="GET" id="searchFormtitle">
        <h1 class="color-f p-1 mt-1"><i class="bi bi-funnel"></i> Filters</h1>
        <hr>
        <h2 class="color-f">Per Categoria:</h2>
        @foreach ($categories as $category)
        <div class="checkbox box-category">
            <label for="searchcategories"><input type="checkbox" class="icheck checkboxcategory" name="searchcategories" value="{{$category->id}}"> <span class="pointer checkspan">{{$category->name}}</span></label>
        </div>
        @endforeach
        <hr>
        <h2 class="color-f">Cosa Cerchi:</h2>
        <div class="input-group">
            <label for="searchtitle"></label>
            <input type="text" class="form-control labelborder" placeholder="Cerca" name="searchtitle">
        </div>

        <hr>

        <h2 class="color-f">Nuovi Annunci:</h2>
        <div class="input-group">
            <label for="searchLatestandOldest"></label>
            <select name="searchLatestandOldest" class="form-control labelborder" >
                <option value="" id="selectlatestolders">-</option>
            <option value="latest" id="latest">Dal più recente</option>
            <option value="oldest" id="oldest">Dal meno recente</option>
            </select>
        </div>

        <hr>

        <div class="input-group">
            <button type="submit" class="btn btn-outline button-filters me-4 mb-3 buttonmodal">
                <i class="bi bi-search"></i>
            </button>
    </form>
            <button type="button" class="btn btn-outline button-filters buttonmodal mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Ricerca Avanzata
            </button>
        </div>
</div>


 <!-- Modal -->
 <div class="modal fade modal-xl " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  ">
      <div class="modal-content  ">
        <div class="modal-header filter">
            <div>
          <h1 class="modal-title fs-5" id="exampleModalLabel">Ricerca Avanzata</h1>
        </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body backgroundmain ">
    <div class="container-fluid">
            <div class="row align-items-start p-3 mb-3 g-3 text-center modalresponsive">
                <div class="col-sm-3  position-relative  ">
                    <form action="{{route('search.advanced')}}" method="GET" id="advancedsearch">
                    <label for="advancedsearchtitle" class="label">Cosa cerchi?</label>
                    <input id="advancedsearchtitle" type="text" class="form-control labelborder" name="advancedsearchtitle" placeholder="Cerca">
                </div>
            <div class="col-sm-6">
                    <label for="advancedsearcategories" class="label">Seleziona una Categoria</label>
                      <select class="form-control labelborder"  name="advancedsearcategories">
                        <option value="" id="advancedsearcategorieselect" >-</option>
                        @foreach ($categories as $categorie)
                          <option  value="{{$categorie->id}}">{{$categorie->name}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="col-sm-3">
                        <label for="advancedsearchlatestoldest" class="label">nuovi annunci</label>
                        <select name="advancedsearchlatestoldest" class="form-control labelborder" >
                            <option value="" id="advancedsearchlatestoldestselect">-</option>
                          <option value="latestmodal" id="latestmodal">Dal più recente</option>
                          <option value="oldestmodal" id="oldestmodal">Dal meno recente</option>
                        </select>
                    </div>
                    <div class="col-sm-8 ">
                            <label for="advancedsearchbody" class="label">Descrizione</label>
                            <input id="advancedsearchbody" type="text" class="form-control labelborder" name="advancedsearchbody" placeholder="Inserisci cosa cerchi in particolare">
                        </div>
                        <div class="col-sm-4 ">
                            <label for="advancedsearchtype" class="label">Tipo</label>
                            <select name="advancedsearchtype" class="form-control labelborder" >
                            <option value="" id="advancedsearchtypeselect">-</option>
                            <option value="advancedsearchtypesell" id="advancedsearchtypesell">Vendo</option>
                            <option value="advancedsearchtypesearch" id="advancedsearchtypesearch">Cerco</option>
                            </select>
                        </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="mt-3 btn btn-outline-secondary  buttonmodal" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="mt-3 btn btn-outline-success  buttonmodal">Avvia la ricerca</button>

        </div>
      </div>
    </div>
</div>


