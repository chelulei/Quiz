<div class="single-sidebar-widget post-category-widget">
    <h4 class="category-title">All Subjects</h4>
    <ul class="cat-list">
        @foreach($categories as $category)
            <li>
                <a href="{{ route('category.home',$category->id)}}" class="d-flex justify-content-between">
                    <p>{{$category->title }}</p>
                </a>
            </li>
        @endforeach
    </ul>
</div>
<div class="single-sidebar-widget newsletter-widget">
    <h4 class="newsletter-title"><a href="{{route('questions.create')}}" class="text-white">ASK QUESTION</a></h4>
</div>