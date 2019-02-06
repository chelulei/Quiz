<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
</head>

<body class="mh-fullscreen bg-img center-vh p-20">
<!-- Main container -->
<div class="card card-shadowed p-50 w-500 mb-0" style="max-width: 100%">
    @yield('content')
</div>
<!-- END Main container -->
<!-- Scripts -->
@include('partials.scripts')
</body>
</html>