<span class="text-muted">
{{$label ." ". $model->date}}
</span>
<div class="media mt-2">
    <a href="{{$model->user->url}}" class="pr-2">
        <img class="mr-3" src="assets/img/avatar/1.jpg" alt="">
    </a>
    <div class="media-body mt-1">
        <a href="{{$model->user->url}}" class="pr-2">
            {{$model->user->name}}
        </a>
    </div>
    <!-- /.media-body -->
</div>
<!-- /.media -->