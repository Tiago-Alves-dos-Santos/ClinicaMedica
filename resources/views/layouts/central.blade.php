<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('includes.header')
<body>
    <div class="lt-central-container">
        @yield('body')
    </div>

    @include('includes.footer')
</body>
</html>