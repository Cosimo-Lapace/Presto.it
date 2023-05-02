@if(session()->has('success'))
<div class="container m-5">
    <div class="alert backgroundwhite">
        {{session('success')}}
    </div>
</div>
@endif
@if(session()->has('message'))
<div class="container m-5">
    <div class="alert backgroundwhite">
        {{session('message')}}
    </div>
</div>
@endif

