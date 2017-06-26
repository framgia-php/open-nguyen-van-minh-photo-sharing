@foreach($comments as $comment)
<div class="media">
    <div class="media-left">
        <img src="{{ 'http://localhost/myapp/public/images/' . $comment->user->avatar_photo }}" class="media-object" style="width:40px">
    </div>
    <div class="media-body">
        <h5 class="media-heading"> {{$comment->user->name }} </h5>
        <p> {{ $comment->comment }} </p>
    </div>
</div>
@endforeach
