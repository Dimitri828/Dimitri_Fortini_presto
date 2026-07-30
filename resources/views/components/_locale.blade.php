
<form action="{{route("setLocale",$lang)}}" method="POST" class="d-inline">
    @csrf
    <button type="submit" class="btn">
        <img src="{{asset('vendor/blade-flags/country-'.$lang.'.svg')}}" width="32" height="32" alt="bandiera lingua">
        @switch($lang)
            @case("it")
                <span class="text-pr text-blk d-lg-none">{{__("ui.italian")}}</span>
                @break
            @case("uk")
                <span class="text-pr text-blk d-lg-none">{{__("ui.english")}}</span>
                @break
            @case("es")
                <span class="text-pr text-blk d-lg-none">{{__("ui.spanish")}}</span>
                @break                 
        @endswitch
    </button>
</form>