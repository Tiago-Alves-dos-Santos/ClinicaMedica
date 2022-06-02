<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('includes.header')

    @include('includes.sidebar_atendimento')
    <div class="lt-atendimento-container">
        @yield('body')
    </div>

    @stack('scripts')
    @if (session()->has('msg_toast'))
    <script>
        showToast("{{session('msg_toast.title')}}","{{session('msg_toast.information')}}", "{{session('msg_toast.type')}}", "{{session('msg_toast.time')}}")
    </script>
    @php
        session()->forget('msg_toast');
    @endphp
    @elseif (session()->has('msg_alert'))

    @php
        session()->forget('msg_toast');
    @endphp
    @endif
    @include('includes.footer')
</body>
</html>
