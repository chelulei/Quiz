
    <h4 class="p-1 my-3  border-bottom border-info">Subjects</h4>
    <ul class="cat-list">
        @foreach($categories as $category)
            <li>
                <a href="{{ route('category.home',$category->id)}}" class="d-flex justify-content-between">
                    <p>{{$category->title }}</p>
                </a>
            </li>
        @endforeach
    </ul>

