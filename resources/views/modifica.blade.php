<x-main>
    <x-nav/>
    <div class="container-fluid cont-profilo profilobodyresponsive">
        <form action="{{route ('profiloPost', auth()->user()->id )}}" class="profilobodyresponsive m-0" method="POST" enctype="multipart/form-data" id="formupdateuser">
            @csrf
            @method('PUT')
        <div class="main-body profilobodyresponsive">
            <div class="row gutters-sm d-flex justify-content-sm-center profiloresponsive ">
                <div class="col-md-3 mb-3 ">
                    <div class="card  profiloresponsivecard">
                        <div class="card-body">
                            <h2 class="title text-center">AREA PERSONALE <i class="bi bi-pin-angle"></i></h2>
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{ asset(auth()->user()->image ? Storage::url(auth()->user()->image ): 'images/default-placeholder.png') }}" alt="Admin" class="rounded-circle img-fluid" width="200">
                                <div class="mt-3">
                                    <h4>{{auth()->user()->name}}</h4>
                                    <p class="card-text">Full Stack Developer Junior</p>
                                </div>
                                <div class="mt-3">
                                    <h3 class="mb-3" id="textinseriscimmagine">Inserisci immagine profilo</h3>
                                    <label for="image" id="image"></label>
                                    <input class="form-control labelborder" type="file" name="image" id="inputimage"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 w-50 profiloresponsivecard2 ">
                    <div class="card mb-3 ">
                        <div class="card-body">
                            <h2 class="title text-center mb-3">MODIFICA INFORMAZIONI <i class="bi bi-gear"></i></h2>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="label mb-0">Nome</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
									<h6 type="text" class="text-secondary" name="name" value="{{auth()->user()->name}}" id="name">{{auth()->user()->name}}</h6>
								</div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="label mb-0">Data di Nascita</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
									<h6 type="date" class="text-secondary" value="{{auth()->user()->date}}" name="date" id="date">{{auth()->user()->date}}</h6>
								</div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="label mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
									<h6 type="email" class="text-secondary" value="{{auth()->user()->email}}" name="email" id="email">{{auth()->user()->email}}</h6>
								</div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="label mb-0">Numero di Telefono</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
									<h6 type="number" class="text-secondary" value="{{auth()->user()->phone}}" name="phone" id="phone">{{auth()->user()->phone}}</h6>
								</div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="label mb-0" >Indirizzo</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
									<h6 type="text" class="text-secondary" value="{{auth()->user()->address}}" name="address" id="address">{{auth()->user()->address}}</h6>
								</div>
                            </div>
                            <div class="col-sm-12 text-center mb-3">
                                <button class="btn button-filters btn-crea"  type="submit" id="update">Modifica</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
    @vite(['resources/js/userupdate.js'])
</x-main>

