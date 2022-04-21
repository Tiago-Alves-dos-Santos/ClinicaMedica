<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('includes.header')
<body>
    @include('includes.sidebar')
    @include('includes.navbar')
    @component('components.breadcumb', ['titulo' => $titulo_pagina, 'links' => ($links ?? ["0","0"])])
            
    @endcomponent
    <div class="lt-home-container container-fluid">
        @yield('body')
    </div>

    @include('includes.footer')
</body>
</html>