<x-main>

<section class="h-100">
    <div class="container py-5 h-100 container-forgot">
         <div class="row g-0 justify-content-center align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="card card-forgot">
                        <div class="card-body p-5 shadow-5 text-center">
                            <h2 class="fw-bold mb-5 ">Reset Password</h2>
                             <form action="{{route('password.update')}}" method="POST">
                         @csrf
                            <div class="row">
                                <div class="col-md-12 mb-4 " style="display: none">
                                    <label for="email" class="form-label" ></label>
                                    <input type="email" class="form-control" name="email" id="" value="{{$email}}">
                                      @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
                                 </div>
                                        <div class="col-md-12 mb-4">
                                            <label for="password" class="form-label" >Password</label>
                                            <input type="password" name="password" class="form-control" id="" >
                                             @error('password') <span class="text-danger small">{{ $message }}</span> @enderror
                                          </div>
                                            <div class="col-md-12 mb-4">
                                            <label for="password_confirmation">Confirm Password</label>
                                            <input type="password" name="password_confirmation" id="" class="form-control">
                                            </div>
                                             <div class="col-md-12 mb-4">
                                                <label for="token"></label>
                                                <input class="token" value="{{$token}}" type="token" name="token" id="token" class="form-control">
                                                </div>
                             </div>
                                                <button type="submit" class="btn button-filters  btn-block mb-4">Invia</button>
                                  </form>


                        </div>
                    </div>
                </div>
        </div>
     </div>

</section>

</x-main>
