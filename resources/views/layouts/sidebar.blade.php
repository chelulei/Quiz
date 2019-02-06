<h6 class="sidebar-title">Search</h6>
<form class="input-group" target="#" method="GET">
    <input type="text" class="form-control" placeholder="Search">
    <span class="input-group-addon"><i class="ti-search"></i></span>
</form>

<hr>

<h6 class="sidebar-title">Categories</h6>
<div class="row link-color-default fs-14 lh-24">

    @foreach ($categories as $category)
        <div class="col-12">
            <a href="{{ route('category', $category->slug) }}"> {{ $category->title }}</a>
        </div>
    @endforeach
</div>

<hr>

<h6 class="sidebar-title">Top posts</h6>
<a class="media-thumb" href="blog-single.html">
    <img class="rounded" src="assets/img/blog-2.jpg">
    <p class="media-body">Download our Chrome extension</p>
</a>

<a class="media-thumb" href="blog-single.html">
    <img class="rounded" src="assets/img/blog-6.jpg">
    <p class="media-body">TheSaaS has just started!</p>
</a>

<a class="media-thumb" href="blog-single.html">
    <img class="rounded" src="assets/img/blog-5.jpg">
    <p class="media-body">Read a getting started tutorial</p>
</a>

<a class="media-thumb" href="blog-single.html">
    <img class="rounded" src="assets/img/blog-1.jpg">
    <p class="media-body">New features will add to dashboard soon</p>
</a>

<hr>

<h6 class="sidebar-title">Tags</h6>
<div class="gap-multiline-items-1">
    <a class="badge badge-secondary" href="#">Record</a>
    <a class="badge badge-secondary" href="#">Progress</a>
    <a class="badge badge-secondary" href="#">Customers</a>
    <a class="badge badge-secondary" href="#">Freebie</a>
    <a class="badge badge-secondary" href="#">Offer</a>
    <a class="badge badge-secondary" href="#">Screenshot</a>
    <a class="badge badge-secondary" href="#">Milestone</a>
    <a class="badge badge-secondary" href="#">Version</a>
    <a class="badge badge-secondary" href="#">Design</a>
    <a class="badge badge-secondary" href="#">Customers</a>
    <a class="badge badge-secondary" href="#">Job</a>
</div>

<hr>

<h6 class="sidebar-title">About</h6>
<p class="fs-12">TheSaaS is a responsive, professional, and multipurpose SaaS, Software, Startup and WebApp landing template powered by Bootstrap 4. TheSaaS is a powerful and super flexible tool for any kind of landing pages.</p>