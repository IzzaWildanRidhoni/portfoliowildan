<!DOCTYPE html>
<html lang="en">

<head>
    {{-- Head --}}
    @include('layouts._head')
    @stack('styles')
</head>

<body class="index-page">

    {{-- Header --}}
    @include('layouts._header')

    {{-- Main --}}
    <main class="main">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('layouts._footer')

    {{-- Script --}}
    @include('layouts._script')
    @stack('scripts')

</body>

</html>
