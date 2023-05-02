<x-main>
    <x-nav/>
    <section class="h-100">
        <div class="container py-5 h-100 container-forgot">
            <div class="row g-0 justify-content-center align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="card card-forgot">
                        <div class="card-body p-5 shadow-5 text-center">
                            <h2 class="fw-bold mb-5 ">Recupera Password</h2>
                            <form action="{{route('password.email')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 mb-4">
                                        <label class="form-label" for="email">Email address</label>
                                        <input type="email" name="email" class="form-control"/>
                                        @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-outline-success btn-block mb-4">
                                    Invia
                                </button>
                            </form>
                            <div class="text-center">
                            <p>or sign up with:</p>
                            <button type="button" class="btn icone-contatti">
                                <i class="bi bi-facebook"></i>
                            </button>

                            <button type="button" class="btn icone-contatti">
                                <i class="bi bi-google"></i>
                            </button>

                            <button type="button" class="btn icone-contatti">
                                <i class="bi bi-twitter"></i>
                            </button>

                            <button type="button" class="btn icone-contatti">
                                <i class="bi bi-github"></i>
                            </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-main>











