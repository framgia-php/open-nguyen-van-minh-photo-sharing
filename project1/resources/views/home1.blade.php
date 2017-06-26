@extends('layouts.master')

@section('title','Trang chủ')
@section('content')
@parent
    @if(Auth::check())
    <input type="hidden" id="_token" value="<?php echo csrf_token() ?>">
    @endif
    @section('name1')
    @for($i = 0; $i < round(count($images)/2); $i++)
        @if($images[$i]['scope'] == 0)
        <div class="text-left user">

            <!-- Information owner's picture -->
            <span class="tieude">
                <a href="{{ 'userpage/' . $images[$i]->user->id}}">
                    <img src="{{ url('/') . '/images/' . $images[$i]->user->avatar_photo }}" class="img-circle" alt="Cinque Terre" width="40" height="40"/>
                    {{$images[$i]->user->name }}
                </a>
                <br>
            </span>
            <br>

            <!-- Information picture -->
            <p style="font-family: cursive"> {{ $images[$i]['description'] }} </p>
            <button style="border: hidden; background-color: white" data-toggle="modal"
            data-target="{{'#myModal' . $images[$i]['image_id'] }}">
                <img src="{{ url('/') . '/images/' . $images[$i]['path'] }}" alt="myphoto" style="width:100%"/>
            </button>
            <!-- Modal -->
            <div class="modal fade" id="{{'myModal'. $images[$i]['image_id'] }}" role="dialog">
                <div class="modal-dialog">

                <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-body">
                            <span class="tieude">
                                <a href="{{ 'userpage/' . $images[$i]->user->id}}">
                                    <img src="{{ url('/') . '/images/' . $images[$i]->user->avatar_photo }}" class="img-circle" alt="Cinque Terre" width="40" height="40"/>
                                {{$images[$i]->user->name }}
                                </a>
                                <br>
                            </span>
                            <br>
                            <p style="font-family: cursive"> {{ $images[$i]['description'] }} </p>
                        <img src="{{ url('/') . '/images/' . $images[$i]['path'] }}" alt="myphoto" style="width:100%"/>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>

            <!-- Display like button -->
            @if(!Auth::check())
                <button id="guest" name="{{ $images[$i]['image_id'] }}" class="btn btn-default" style="font-size: 12px">
                {{$images[$i]['like'] }}
                <i class="fa fa-heart-o" style="font-size:12px;color:red"></i>
                </button>
            @else
                <!-- If user liked image -->
                @if(count($like->isLike(Auth::user()->id, $images[$i]['image_id'])) == 1)
                    <button id="liked" name="{{ $images[$i]['image_id'] }}" class="btn btn-danger" style="font-size: 12px">
                    {{ $images[$i]['like'] }}
                    <i class="fa fa-heart-o" style="font-size:12px;color:white"></i>
                    </button>
                <!-- else -->
                @else
                    <button id="like" name="{{ $images[$i]['image_id'] }}" class="btn btn-default" style="font-size: 12px">
                    {{$images[$i]['like'] }}
                    <i class="fa fa-heart-o" style="font-size:12px;color:red"></i>
                    </button>
                @endif
            @endif

            <!-- Display show comment and comment -->
            <button id="show_comment" name="{{ $images[$i]['image_id'] }}" style="font-size: 12px" ><i class="fa fa-comment-o"></i>
            </button>
            <hr>
            @if(Auth::check())
            <div class="media" style="font-family : cursive;">
              <div class="media-left">
                <img src=" {{ url('/') . '/images/' . Auth::user()->avatar_photo }} " class="media-object" style="height:40px;">
              </div>
              <div class="media-body">
                <input id="comment_content_{{ $images[$i]['image_id'] }}" type="text" class="form-control" placeholder="Viết bình luận">
                <button id="comment" class="btn btn-primary" name="{{$images[$i]['image_id']}}" style="font-size: 12px" >
                Bình luận </button>
              </div>
            </div>
            <br/>
             @endif

            <div id="display_comment_{{ $images[$i]['image_id'] }}">
            </div>
        </div>
        @endif
    @endfor
    @section('name2')
    @for($i = round(count($images)/2); $i < count($images); $i++)
        @if($images[$i]['scope'] == 0)
        <div class="text-left user">

            <!-- Information owner's picture -->
            <span class="tieude">
                <a href="{{ 'userpage/' . $images[$i]->user->id}}">
                    <img src="{{ url('/') . '/images/' . $images[$i]->user->avatar_photo }}" class="img-circle" alt="Cinque Terre" width="40" height="40"/>
                    {{$images[$i]->user->name }}
                </a>
                <br>
            </span>
            <br>

            <!-- Information picture -->
            <p style="font-family: cursive"> {{ $images[$i]['description'] }} </p>
            <button style="border: hidden; background-color: white" data-toggle="modal"
            data-target="{{'#myModal' . $images[$i]['image_id'] }}">
                <img src="{{ url('/') . '/images/' . $images[$i]['path'] }}" alt="myphoto" style="width:100%"/>
            </button>
            <!-- Modal -->
            <div class="modal fade" id="{{'myModal'. $images[$i]['image_id'] }}" role="dialog">
                <div class="modal-dialog">

                <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-body">
                            <span class="tieude">
                                <a href="{{ 'userpage/' . $images[$i]->user->id}}">
                                    <img src="{{ url('/') . '/images/' . $images[$i]->user->avatar_photo }}" class="img-circle" alt="Cinque Terre" width="40" height="40"/>
                                {{$images[$i]->user->name }}
                                </a>
                                <br>
                            </span>
                            <br>
                            <p style="font-family: cursive"> {{ $images[$i]['description'] }} </p>
                        <img src="{{ url('/') . '/images/' . $images[$i]['path'] }}" alt="myphoto" style="width:100%"/>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>

             <!-- Display like button -->
            @if(!Auth::check())
                <button id="guest" name="{{ $images[$i]['image_id'] }}" class="btn btn-default" style="font-size: 12px">
                {{$images[$i]['like'] }}
                <i class="fa fa-heart-o" style="font-size:12px;color:red"></i>
                </button>
            @else
                <!-- If user liked image -->
                @if(count($like->isLike(Auth::user()->id, $images[$i]['image_id'])) == 1)
                    <button id="liked" name="{{ $images[$i]['image_id'] }}" class="btn btn-danger" style="font-size: 12px">
                    {{ $images[$i]['like'] }}
                    <i class="fa fa-heart-o" style="font-size:12px;color:white"></i>
                    </button>
                <!-- else -->
                @else
                    <button id="like" name="{{ $images[$i]['image_id'] }}" class="btn btn-default" style="font-size: 12px">
                    {{$images[$i]['like'] }}
                    <i class="fa fa-heart-o" style="font-size:12px;color:red"></i>
                    </button>
                @endif
            @endif

            <!-- Display show comment and comment -->
            <button id="show_comment" name="{{ $images[$i]['image_id'] }}" style="font-size: 12px" ><i class="fa fa-comment-o"></i>
            </button>
            <hr>
            @if(Auth::check())
            <div class="media" style="font-family : cursive;">
              <div class="media-left">
                <img src=" {{ url('/') . '/images/' . Auth::user()->avatar_photo }} " class="media-object" style="height:40px;">
              </div>
              <div class="media-body">
                <input id="comment_content_{{ $images[$i]['image_id'] }}" type="text" class="form-control" placeholder="Viết bình luận">
                <button id="comment" class="btn btn-primary" name="{{$images[$i]['image_id']}}" style="font-size: 12px" >
                Bình luận </button>
              </div>
            </div>
            <br/>
             @endif

            <div id="display_comment_{{ $images[$i]['image_id'] }}">
            </div>
        </div>
        @endif
    @endfor
    @endsection
@endsection
