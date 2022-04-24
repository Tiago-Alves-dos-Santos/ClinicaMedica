<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('includes.header')
<body>
    @include('includes.sidebar')
    @include('includes.navbar')
    <x-breadcumb :titulo="$titulo_pagina" :links="($links)"/>
    <div class="lt-home-container container-fluid">
        @yield('body')
    </div>

    @include('includes.footer')
</body>
</html>
