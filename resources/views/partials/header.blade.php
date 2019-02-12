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
                    <li class="nav-item dropdown">
                        <a class="nav-link text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="head text-light bg-dark">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-12">
                                        <span>Notifications (3)</span>
                                        <a href="" class="float-right text-light">Mark all as read</a>
                                    </div>
                            </li>
                            <li class="notification-box">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-3 col-3 text-center">
                                        <img src="/demo/man-profile.jpg" class="w-50 rounded-circle">
                                    </div>
                                    <div class="col-lg-8 col-sm-8 col-8">
                                        <strong class="text-info">David John</strong>
                                        <div>
                                            Lorem ipsum dolor sit amet, consectetur
                                        </div>
                                        <small class="text-warning">27.11.2015, 15:00</small>
                                    </div>
                                </div>
                            </li>
                            <li class="notification-box bg-gray">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-3 col-3 text-center">
                                        <img src="/demo/man-profile.jpg" class="w-50 rounded-circle">
                                    </div>
                                    <div class="col-lg-8 col-sm-8 col-8">
                                        <strong class="text-info">David John</strong>
                                        <div>
                                            Lorem ipsum dolor sit amet, consectetur
                                        </div>
                                        <small class="text-warning">27.11.2015, 15:00</small>
                                    </div>
                                </div>
                            </li>
                            <li class="notification-box">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-3 col-3 text-center">
                                        <img src="/demo/man-profile.jpg" class="w-50 rounded-circle">
                                    </div>
                                    <div class="col-lg-8 col-sm-8 col-8">
                                        <strong class="text-info">David John</strong>
                                        <div>
                                            Lorem ipsum dolor sit amet, consectetur
                                        </div>
                                        <small class="text-warning">27.11.2015, 15:00</small>
                                    </div>
                                </div>
                            </li>
                            <li class="footer bg-dark text-center">
                                <a href="" class="text-light">View All</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav><!-- #nav-menu-container -->
        </div>
    </div>
</header>