<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
    @yield('style')
</head>

<body>
@include('partials.header')
<!-- END Header -->
<!-- banner -->
@include('partials.banner')
<!-- END banner -->

<!-- Main container -->

    @yield('content')

<!-- END Main container -->
<!-- Footer -->
@include('partials.footer')
<!-- END Footer -->
<!-- Scripts -->
@include('partials.scripts')
@yield('script')
</body>
</html>
