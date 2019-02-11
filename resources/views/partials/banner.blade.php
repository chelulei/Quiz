<section class="relative blog-home-banner" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content blog-header-content col-lg-12">

                    <form action="{{ route('questions') }}">
                        <div class="input-group">
                            <input type="text" class="form-control input-lg" value="{{ request('term') }}" name="term"
                                   placeholder="Search for...">
                            <span class="input-group-btn">
                <button class="btn btn-lg btn-primary" type="submit">
                <i class="fa fa-search"></i>
                </button>
                </span>
                        </div>
                    </form>

                <p class="text-white">

                </p>
            </div>
        </div>
    </div>
</section>