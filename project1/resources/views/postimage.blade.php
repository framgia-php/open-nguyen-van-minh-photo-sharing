@extends('layouts.master')

@section('content')
    <div id="div1" class="col-sm-10 sidenav">
      <form action="/project1/public/postimage" method="POST">
        {!! csrf_field() !!}
      <div class="text-left user">
        <span class="tieude">
          <img src="{{ url('/') . '/images/' . Auth::user()->avatar_photo }}" class="img-circle" alt="Cinque Terre" width="40" height="40"/>
          {{ Auth::user()->name}}
          <br>
          <br>
        </span>
        <textarea class="form-control" rows="5" name="description" placeholder="Miêu tả ảnh"></textarea>
        <br>
        <img src="{{ url('/') . '/images/' . $path }}" width=500px>
        <input type="hidden" name="path" value="{{ $path }}">

        <div class="col-xs-2 form-group">
          <label>Phạm vi</label>
          <select class="form-control" name="scope">
            <option value="0">Mọi người</option>
            <option value="1">Chỉ mình tôi</option>
          </select>
          <br>
          <button name="postImage" class="btn btn-primary">Đăng</button>
        </div>
        <hr>
      </div>
      </form>
    </div>
@endsection

