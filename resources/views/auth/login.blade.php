<x-main>
  <x-nav/>
  <section class="h-100">
    <div class="container py-5 h-100 login-cont">
      <div class="row d-flex justify-content-center align-items-center">
        <div class="col-xl-10">
          <div class="card rounded-3 text-black card-login">
            <div class="row g-0">
              <div class="col-lg-6">
                <div class="card-body-1 p-md-5">
                  <div class="text-center">
                    <img src="{{ asset('images/Soggetto.png') }}" alt="Presto" width="90" >
                    <h4 class="mt-3  pb-1 titolo-cont">LOGIN</h4>
                    <h2 class="text-center">Accedi con:
                      <a href="{{route('google')}}" class="btn icons-auth icons-auth2 border-0">
                        <i class="bi bi-google"></i>
                      </a>

                      <a  href="{{route('redirect')}}" class="btn icons-auth icons-auth2 border-0">
                        <i class="bi bi-github"></i>
                      </a>
                    </h2>
                  </div>
                  <form id="formaccedi" action="/login" method="POST">
                    @csrf

                    <div class="form-outline mb-4">
                      <label for="email" class="label">Email </label>
                      <input type="email" class="form-control labelborder" name="email" id="">
                      @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-outline mb-4 divcardimg">
                      <label for="password" class="label">Password</label>
                        <input type="password" class="form-control labelborder" name="password" id="password" >
                        <span class="spaniconeyelogin"><i class="bi bi-eye-slash-fill" id="iconpasswordeye"></i></span>
                        @error('password') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-check">
                      <label class="form-check-label" for="gridCheck">
                        <a class="text-muted" href="{{route('password.request')}}">Password dimenticata?</a>
                      </label>
                    </div> <br>

                    <div class="text-center pt-1 pb-1">
                      <button  type="submit" class="btn button-filters  btn-crea" id="buttonlogin">Login</button>
                    </div>

                    <div class="d-flex align-items-center justify-content-center pb-4">
                      <p class="mb-0 me-2 label buttonresp" id="paragrafregisterinloginpage">Non Hai un Account  <a href="{{route('register')}}" type="button" class="btn button-filters  ms-2 mb-4 btn-crea buttonresp">Registrati</a></p>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-lg-6 d-flex align-items-center gradient-custom-2 divimagelogin">
                <div class="p-md-4">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp"
                  alt="login form" width="800" height="700" class="img-fluid"/>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @vite(['resources/js/login.js'])
</x-main>




