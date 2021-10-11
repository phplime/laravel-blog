@include('backend/layouts.header')
@if(!request()->is('login'))
    @include('backend/layouts.menu')
    @include('backend/layouts.sidebar')
@endif
@yield('content')
@include('backend/layouts.footer')