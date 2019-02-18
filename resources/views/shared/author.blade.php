<span class="text-muted">
{{$label ."  ". $model->date}}
</span>
<div class="media mt-2">
    <?php $user = Auth::user(); ?>
    <a href="{{$model->user->url}}" class="pr-2">
        <img class="mr-3 rounded-circle" src="{{ $user->image_url}}" width="30" height="30" alt="">
    </a>
    <div class="media-body mt-1">
        <a href="{{$model->user->url}}" class="pr-2">
            {{$model->user->name}}
        </a>
    </div>
    <!-- /.media-body -->
</div>
<!-- /.media -->