<div class="card mt-4">
    <div class="card-body">
        <h5 class="card-title">
            {{$answersCount ." ". str_plural('Answer',$answersCount)}}</h5>
        <hr>
        @include('layouts._messages')
        @foreach ($answers as $answer)
            <div class="media">
                <div class="d-flex flex-column vote-controls">
                    <a title="This answer is useful"
                       class="vote-up {{Auth::guest() ? 'off': ''}}"
                       onclick="event.preventDefault(); document.getElementById('up-vote-answer-{{$answer->id}}').submit();"
                    >
                        <i class="fa fa-caret-up fa-2x" aria-hidden="true"></i>
                    </a>
                    <form  id="up-vote-answer-{{$answer->id}}" action="/answers/{{$answer->id}}/vote" method="POST" style="display: none;">
                        @csrf
                        <input type="hidden" name="vote" value="1">
                    </form>
                    <span class="votes-count">{{$answer->votes_count}}</span>

                    <a title="This answer is useful"  class="vote-down {{Auth::guest() ? 'off': ''}}"
                       onclick="event.preventDefault(); document.getElementById('down-vote-answer-{{$answer->id}}').submit();"
                    >
                        <i class="fa fa-caret-down fa-2x" aria-hidden="true"></i>
                    </a>

                    <form  id="down-vote-answer-{{$answer->id}}" action="/answers/{{$answer->id}}/vote" method="POST" style="display: none;">
                        @csrf
                        <input type="hidden" name="vote" value="-1">
                    </form>
                </div>
                {{--<img class="mr-3" src="..." alt="Generic placeholder image">--}}
                <div class="media-body">
                    {!! $answer->body_html !!}
                    <div class="row">
               <div class="col-4">
                   <div class="ml-auto">

                       {!! Form::open(['method' => 'DELETE', 'route' => ['questions.answers.destroy', $question->id,$answer->id, 'class' =>'form-delete']]) !!}
                       @csrf
                       @can('update',$answer)
                           <a href="{{route('questions.answers.edit',[$question->id,$answer->id])}}" class="btn btn-sm btn-outline-info">Edit</a>
                       @endcan
                       @can('delete',$answer)
                           <button onclick="return confirm('Are you sure?');" type="submit" class="btn btn-sm btn-outline-danger">
                               <i class="fa fa-times"></i>
                               Delete
                           </button>
                       @endif
                       {!! Form::close() !!}
                   </div><!-- /.ml-auto -->
               </div>
                 <!-- /.col-4 -->
                        <div class="col-4"></div>
                        <!-- /.col-4 -->
                        <div class="col-4">
                            @include('shared.author',[
                            'model'=>$answer,
                            'label'=>'answered'
                            ])
                        </div>
                        <!-- /.float-righ -->
                    </div>  <!-- /.row -->

                </div>
            </div>
        @endforeach
    </div>
</div>