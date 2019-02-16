<header id="header" class="bg-primary">
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
                        <div class="input-group">
                            <input type="text" class="form-control input-lg" value="{{ request('term') }}" name="term"
                                   placeholder="Search for...">
                            <div class="input-group-append">
                                <button  class="btn btn-info" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                </form>

            <nav id="nav-menu-container">
                <ul class="nav-menu">
                        <li><a href="{{route('questions.index')}}">Blog</a></li>

                <!-- #notifications -->
                    <li class="menu-has-children"><a href=""> <i class="fa fa-bell"></i></a>
                        <ul>
                            <li><a href="#">loremm</a></li>
                            <li><a href="#">loremm</a></li>
                        </ul>
                    </li>

                    <li class="menu-has-children"><a href="">
                            <img src="assets/img/user.png" class="profpic float-right rounded-circle" alt="Profile picture">
                        </a>
                        <ul>
                            <li><a  href="{{route('backend.account.index')}}">View Profile</a></li>
                            <li>
                                <?php $user = Auth::user(); ?>
                                <a  href="{{ route('profile-edit', ['user' => $user]) }}">Edit Password</a>
                            </li>
                            <li>
                                <a  href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav><!-- #nav-menu-container -->
        </div>
    </div>
</header>


