 <div class="single-sidebar-widget user-info-widget">
        <?php $user = Auth::user(); ?>
        <img src="{{$user->image_url}}" alt="" class="rounded-circle" width="100" height="100">
        <a href="#"><h4>{{$user->name}}</h4></a>
        <ul class="social-links">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-github"></i></a></li>
            <li><a href="#"><i class="fa fa-behance"></i></a></li>
        </ul>
        <p>
Lorem ipsum dolor sit.
        </p>
    </div>


