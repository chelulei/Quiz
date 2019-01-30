
<div class="d-flex flex-column vote-controls">
    <a title="This question is useful"
       class="vote-up {{Auth::guest() ? 'off': ''}}"
       onclick="event.preventDefault(); document.getElementById('up-vote-question-{{$question->id}}').submit();"
    >
        <i class="fa fa-caret-up fa-2x" aria-hidden="true"></i>
    </a>
    <form  id="up-vote- question-{{$question->id}}" action="/questions/{{$question->id}}vote" method="POST" style="display: none;">
        @csrf
        <input type="hidden" name="vote" value="1">
    </form>
    <span class="votes-count">{{$question->votes_count}}</span>

    <a title="This question is not useful"  class="vote-down {{Auth::guest() ? 'off': ''}}"
       onclick="event.preventDefault(); document.getElementById('down-vote-question-{{$question->id}}').submit();"
    >
        <i class="fa fa-caret-down fa-2x" aria-hidden="true"></i>
    </a>

    <form  id="down-vote question-{{$question->id}}" action="/questions/{{$question->id}}/vote" method="POST" style="display: none;">
        @csrf
        <input type="hidden" name="vote" value="-1">
    </form>
    @include('shared.favorite')
</div>