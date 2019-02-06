<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
</head>

<body>
<!-- Topbar -->
@include('partials.top')
<!-- END Topbar -->
<!-- Header -->
@include('partials.header')
<!-- END Header -->

<!-- Main container -->
<main class="main-content bg-gray">
    @yield('content')
</main>
<!-- END Main container -->
<!-- Footer -->
@include('partials.footer')
<!-- END Footer -->
<!-- Scripts -->
@include('partials.scripts')
</body>
</html>
