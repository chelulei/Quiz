<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
    @yield('style')
    <script src="{{asset('/assets/vendor/tinymce/plugin/tinymce/tinymce.min.js')}}"></script>
    <script>tinymce.init({
            selector:'textarea',
            menubar:'false'
        });</script>
</head>

<body>
@include('partials.nav')
<!-- END Header -->
<!-- Main container -->

@yield('content')

<!-- END Main container -->
<!-- Footer -->
@include('partials.footer')
<!-- END Footer -->
<!-- Scripts -->
@include('partials.scripts')
</body>
</html>
