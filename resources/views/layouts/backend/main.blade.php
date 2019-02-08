<!DOCTYPE html>
<html lang="en">
<head>
    @include('backend_partials._head')
    @yield('style')
</head>

<body>

<!-- Left Panel -->
<!-- /#left-panel -->

@include('layouts.backend.left')
<!-- Left Panel -->

<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!-- Header-->
@include('layouts.backend.header')
    <!-- /header -->
    <!-- Header-->
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active"><a href="{{route('questions.index')}}">Questions</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">

     @yield('content')


    </div> <!-- .content -->
</div><!-- /#right-panel -->

<!-- Right Panel -->
@include('backend_partials._scripts')
@yield('script')
</body>
</html>