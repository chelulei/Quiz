<!-- start banner Area -->
<section class="banner-area relative blog-home-banner" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content blog-header-content col-lg-12">
                <h1 class="text-white">
                    Dude You’re Getting
                    a Telescope
                </h1>
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-8">
                        <form>
                            <div class="card-body row no-gutters align-items-center">
                                <div class="col">
                                    <input  name="term" class="form-control form-control-lg form-control-borderless" type="search" placeholder="Search topics or keywords">
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
    </div>
</section>
<!-- End banner Area -->
<!-- Start top-category-widget Area -->
<section class="top-category-widget-area pt-20 pb-20" style="background-color: #EBF2F7;">
    <div class="container">
        <div class="row">
            <nav class="nav">
                @foreach($categories as $category)
                    <a class="nav-link" href="{{ route('category.home',$category->id)}}">{{$category->title }}</a>
                @endforeach
            </nav>
        </div>
    </div>
</section>
