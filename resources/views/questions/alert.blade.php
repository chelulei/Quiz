@if (isset($categoryName))
    <div class="alert alert-info">
        <p>Category: <strong>{{ $categoryName }}</strong></p>
    </div>
@endif
@if ($term=request('term'))
    <div class="alert alert-info">
        <p>Search Results For: <strong>{{ $term }}</strong></p>
    </div>
@endif