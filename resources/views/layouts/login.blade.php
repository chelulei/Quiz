<!DOCTYPE html>
<html lang="en">
<head>
    @include('backend_partials._head')
</head>

<body  class="mh-fullscreen bg-img center-vh " style="background-color:#56B3F9;">
<!-- Main container -->
<div class="sufee-login d-flex align-content-center flex-wrap"><div class="container">
    @yield('content')
</div>
</div>
<!-- END Main container -->
<!-- Scripts -->
@include('backend_partials._scripts')
</body>
</html>