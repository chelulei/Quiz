
    <div class="single-sidebar-widget search-widget">
        <form class="search-form" action="{{ route('questions') }}">
            <input placeholder="Search Questions" value="{{ request('term') }}" name="term"type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'" >
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>

    {{--<div class="single-sidebar-widget popular-post-widget">--}}
        {{--<h4 class="popular-title">Popular Questions</h4>--}}
        {{--<div class="popular-post-list">--}}
            {{--<div class="single-post-list d-flex flex-row align-items-center">--}}
                {{--<div class="thumb">--}}
                    {{--<img class="img-fluid" src="img/blog/pp1.jpg" alt="">--}}
                {{--</div>--}}
                {{--<div class="details">--}}
                    {{--<a href="blog-single.html"><h6>Space The Final Frontier</h6></a>--}}
                    {{--<p>02 Hours ago</p>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="single-post-list d-flex flex-row align-items-center">--}}
                {{--<div class="thumb">--}}
                    {{--<img class="img-fluid" src="img/blog/pp2.jpg" alt="">--}}
                {{--</div>--}}
                {{--<div class="details">--}}
                    {{--<a href="blog-single.html"><h6>The Amazing Hubble</h6></a>--}}
                    {{--<p>02 Hours ago</p>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="single-post-list d-flex flex-row align-items-center">--}}
                {{--<div class="thumb">--}}
                    {{--<img class="img-fluid" src="img/blog/pp3.jpg" alt="">--}}
                {{--</div>--}}
                {{--<div class="details">--}}
                    {{--<a href="blog-single.html"><h6>Astronomy Or Astrology</h6></a>--}}
                    {{--<p>02 Hours ago</p>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="single-post-list d-flex flex-row align-items-center">--}}
                {{--<div class="thumb">--}}
                    {{--<img class="img-fluid" src="img/blog/pp4.jpg" alt="">--}}
                {{--</div>--}}
                {{--<div class="details">--}}
                    {{--<a href="blog-single.html"><h6>Asteroids telescope</h6></a>--}}
                    {{--<p>02 Hours ago</p>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="single-sidebar-widget ads-widget">--}}
        {{--<a href="#"><img class="img-fluid" src="img/blog/ads-banner.jpg" alt=""></a>--}}
    {{--</div>--}}
    <div class="single-sidebar-widget post-category-widget">
        <h4 class="category-title">Question Catgories</h4>
        <ul class="cat-list">
            @foreach($categories as $category)
            <li>
                <a href="{{ route('category', $category->slug) }}" class="d-flex justify-content-between">
                    <p>{{ $category->title }}</p>
                    <p>37</p>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
    {{--<div class="single-sidebar-widget newsletter-widget">--}}
        {{--<h4 class="newsletter-title">Newsletter</h4>--}}
        {{--<p>--}}
            {{--Here, I focus on a range of items and features that we use in life without--}}
            {{--giving them a second thought.--}}
        {{--</p>--}}
        {{--<div class="form-group d-flex flex-row">--}}
            {{--<div class="col-autos">--}}
                {{--<div class="input-group">--}}
                    {{--<div class="input-group-prepend">--}}
                        {{--<div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'" >--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<a href="#" class="bbtns">Subcribe</a>--}}
        {{--</div>--}}
        {{--<p class="text-bottom">--}}
            {{--You can unsubscribe at any time--}}
        {{--</p>--}}
    {{--</div>--}}
    {{--<div class="single-sidebar-widget tag-cloud-widget">--}}
        {{--<h4 class="tagcloud-title">Tag Clouds</h4>--}}
        {{--<ul>--}}
            {{--<li><a href="#">Technology</a></li>--}}
            {{--<li><a href="#">Fashion</a></li>--}}
            {{--<li><a href="#">Architecture</a></li>--}}
            {{--<li><a href="#">Fashion</a></li>--}}
            {{--<li><a href="#">Food</a></li>--}}
            {{--<li><a href="#">Technology</a></li>--}}
            {{--<li><a href="#">Lifestyle</a></li>--}}
            {{--<li><a href="#">Art</a></li>--}}
            {{--<li><a href="#">Adventure</a></li>--}}
            {{--<li><a href="#">Food</a></li>--}}
            {{--<li><a href="#">Lifestyle</a></li>--}}
            {{--<li><a href="#">Adventure</a></li>--}}
        {{--</ul>--}}
    {{--</div>--}}
</div>