
@section('style')
    <style>
        .form-control-borderless {
            border: none;
        }

        .form-control-borderless:hover, .form-control-borderless:active, .form-control-borderless:focus {
            border: none;
            outline: none;
            box-shadow: none;
        }
    </style>
@endsection

<section class="relative blog-home-banner" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            {{--<div class="about-content blog-header-content col-lg-8">--}}
                {{--<form action="{{ route('questions') }}">--}}
                {{--<div class="input-group">--}}
                    {{--<input type="text" class="form-control input-lg" value="{{ request('term') }}" name="term"--}}
                           {{--placeholder="Search for...">--}}
                    {{--<div class="input-group-append">--}}
                        {{--<button class="btn btn-secondary" type="submit">--}}
                            {{--<i class="fa fa-search"></i>--}}
                        {{--</button>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--</form>--}}
                {{--<p class="text-white">--}}

                {{--</p>--}}
            {{--</div>--}}
            <div class="about-content blog-header-content col-lg-8">
                <form class="card card-sm">
                    <div class="card-body row no-gutters align-items-center">
                        <div class="col-auto">
                        </div>
                        <!--end of col-->
                        <div class="col">
                            <input class="form-control form-control-lg form-control-borderless" type="search" placeholder="Search questions">
                        </div>
                        <!--end of col-->
                        <div class="col-auto">
                            <button class="btn btn-lg btn-primary" type="submit">Search</button>
                        </div>
                        <!--end of col-->
                    </div>
                </form>
            </div>
            <!--end of col-->
        </div>
        </div>
    </div>
</section>