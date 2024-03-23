@if(Auth::check())
    @if(Auth::user()->role === 'admin')
        @include('layouts.navigation')
    @elseif(Auth::user()->role === 'fonctionnaire')
        @include('layouts.fonctionnaire')
    @endif
@endif
