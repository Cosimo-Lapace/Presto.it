
<x-main>

    <x-message/>
    <style>
        body {
       background-image: url("{{ asset('images/50eae65aa1b3d9ea135ece2a38191b0f.gif') }}");
       background-color: white;
       height : 1600px;
       background-repeat: no-repeat;
       background-size: contain;
   }
       </style>
    <div class="container h-25 w-25 text-center d-flex justify-center align-items-center ">
    <div class="">
    <h1 class="fs-1 text-primary">Ti abbiamo inviato una Email di verifica</h1>
    <p class="fs-5 text-danger">  se non trovi la email clicca qui per ricevere la email di conferma</p>
    <form action="{{route('verification.send')}}" method="POST">
        @csrf
        <button class="buttonhead  effectmail effect-mail"><i class="bi bi-envelope"></i></button>
        </form>
    </div>
</div>


</x-main>

