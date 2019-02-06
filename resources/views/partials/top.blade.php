<nav class="topbar topbar-inverse topbar-expand-md topbar-sticky">
    <div class="container">

        <div class="topbar-left">
            <button class="topbar-toggler">&#9776;</button>
            <!--            <a class="topbar-brand" href="index.html">-->
            <!--                <img class="logo-default" src="assets/img/logo.png" alt="logo">-->
            <!--                <img class="logo-inverse" src="assets/img/logo-light.png" alt="logo">-->
            <!--            </a>-->
            <h3 class="text-white">Logo</h3>
        </div>


        <div class="topbar-right">
            <ul class="topbar-nav nav">
                @if (Route::has('login'))
                    @auth
                <li class="nav-item"><a class="nav-link" href="{{ url('/home') }}">Home</a></li>
                    @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">login</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="#">Blog <i class="fa fa-caret-down"></i></a>
                    <div class="nav-submenu">
                        <a class="nav-link" href="blog-classic.html">Layout classic</a>
                        <a class="nav-link" href="blog-grid.html">Layout grid</a>
                    </div>
                </li>
                    @endauth
                @endif
            </ul>
        </div>

    </div>
</nav>
