<div class="media">
    <div class="media-left">
        <img src="{{ 'http://localhost/project1/public/images/' . Auth::user()->avatar_photo }}" class="media-object" style="width:40px">
    </div>
    <div class="media-body">
        <h5 class="media-heading"> {{ Auth::user()->name}} </h5>
        <p> {{ $comment}} </p>
    </div>
</div>
