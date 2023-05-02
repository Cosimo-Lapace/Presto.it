<form action="{{route ('setLenguage', $lang)}}" method="POST">
    @csrf
    <button type="submit" class="btn fixborder">
        <img src="{{asset('vendor/blade-flags/language-'. $lang . '.svg')}}" width="40" height="40">
        @if($lang === "it")
            <p class="text-lang">ITALY</p>
        @endif
        @if($lang === "en")
            <p class="text-lang">ENGLISH</p>
        @endif
        @if($lang === "fr")
            <p class="text-lang">FRENCH</p>
        @endif
    </button>
</form>
