<div class="card mt-4">
    <div class="card-body">
        <h5 class="card-title">
            {{$answersCount ." ". str_plural('Answer',$answersCount)}}</h5>
        <hr>
        @include('layouts._messages')
        @foreach ($answers as $answer)
            <div class="media">
                <div class="d-flex flex-column vote-controls">
                    <a title="This answer is useful"  class="vote-up">
                        <i class="fa fa-caret-up fa-2x" aria-hidden="true"></i>
                    </a>

                    <span class="votes-count">500</span>

                    <a title="This answer is useful"  class="vote-down off">
                        <i class="fa fa-caret-down fa-2x" aria-hidden="true"></i>
                    </a>
                        @can('accept',$answer)
                    <a title="Mark this answer as best answer"
                       class="{{$answer->status}} mt-2"
                    onclick="event.preventDefault(); document.getElementById('accept-answer-{{$answer->id}}').submit();"
                    >
                        <i class="fa fa-check fa-2x"></i>
                        <!-- /.favorites-count -->
                    </a>
                    <form  id="accept-answer-{{$answer->id}}" action="{{route('answers.accept', $answer->id)}}" method="POST" style="display: none;">
                    @csrf
                    </form>
                            @else
                            @if($answer->is_best)
                            <a title="The question owner accepted this answer as best answer"
                               class="{{$answer->status}} mt-2"
                            >
                                <i class="fa fa-check fa-2x"></i>
                                <!-- /.favorites-count -->
                            </a>
                                @endif
                @endcan
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
                           <a href="{{route('questions.answers.edit',[$question->id, $answer->id])}}" class="btn btn-sm btn-outline-info">Edit</a>
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
                                    <span class="text-muted">
                                       {{ $answer->date}}
                                    </span>
                            <div class="media mt-2">
                                <a href="{{ $answer->user->url}}" class="pr-2">
                                    <img class="mr-3" src="{{$answer->user->avatar}}" alt="Generic placeholder image">
                                </a>
                                <div class="media-body mt-1">
                                    <a href="{{ $answer->user->url}}" class="pr-2">
                                        {{$answer->user->name}}
                                    </a>
                                </div>
                                <!-- /.media-body -->
                            </div>
                            <!-- /.media -->
                        </div>
                        <!-- /.float-righ -->
                    </div>  <!-- /.row -->

                </div>
            </div>
        @endforeach
    </div>
</div>