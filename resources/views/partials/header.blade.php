<header id="header">
    <div class="header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-6 col-4 header-top-left">

                </div>
                <div class="col-lg-6 col-sm-6 col-8 header-top-right">
                    {{--<a href="#" class="primary-btn text-uppercase">Book Appointment</a>--}}
                </div>
            </div>
        </div>
    </div>
    <div class="container main-menu">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
                <a href="index.html">
                    logo
                    {{--<img src="img/logo.png" alt="" title="" />--}}
                </a>
            </div>
                <form class="my-auto d-inline w-50" action="{{ route('questions') }}">
                    <div class="search">
                        <div class="input-group">
                            <input type="text" class="form-control input-lg" value="{{ request('term') }}" name="term"
                                   placeholder="Search for...">
                            <div class="input-group-append">
                                <button  class="btn btn-secondary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.search -->
                </form>

            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ url('/home') }}">Home <span class="sr-only">(current)</span></a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link login" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @endauth
                    @endif

                </ul>
            </nav><!-- #nav-menu-container -->
        </div>
    </div>
</header>