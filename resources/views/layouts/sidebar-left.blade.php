
    <div class="single-sidebar-widget post-category-widget">
        <h4 class="category-title">Categories</h4>
        <ul class="cat-list">
            @foreach($categories as $category)
            <li>
                <a href="{{ route('category', $category->slug) }}" class="d-flex justify-content-between">
                    <p>{{ $category->title }}</p>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
