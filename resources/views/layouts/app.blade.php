<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ url('frontend/images/favicon.png') }}" type="image/x-icon"/>
    <!-- Bootstrap CSS -->
    @stack('pretend-styles')
    @include('includes.style')
    @stack('addon-styles')
    <title>@yield('title')</title>
</head>
<body>
    <!-- Navbar -->
    @yield('navbar')
    {{-- Main Content --}}
    @yield('content')

    @include('includes.footer')
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    @stack('pretend-script')
    @include('includes.script')
    @stack('addon-script')

</body>
</html>