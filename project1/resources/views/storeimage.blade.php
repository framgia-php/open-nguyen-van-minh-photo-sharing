@extends('layouts.master')
@section('title','Kho ảnh')


@section('content')
<div id="div1" class="col-sm-9 sidenav" style="padding-left: 200px; background-color: white;">
    @foreach($images as $image)
    <div class="btn-group" style="padding-top: 30px; padding-left: 0px;">
        <p style="font-family: cursive; font-size: 14px">{{ $image['description'] }}</p>
        <span><button type="button" data-toggle="dropdown" style="border: hidden; background-color: #f1f1f1;">
        <span class="caret"></span></button><span></span>
        <ul class="dropdown-menu" role="menu">
          <li><a href="/project1/public/editimage/{{$image['image_id']}}"><button class="btn btn-block btn-link"
          style="border: hidden; text-align: left;">Chỉnh sửa</button></a></li>
          <li><a href="/project1/public/deleteimage/{{$image['image_id']}}"><button class="btn btn-block btn-link"
          style="border: hidden; text-align: left;">Xóa</button></a></li>
        </ul>
    </div>
    <br>
    <img src="{{ url('/') . '/images/' . $image['path'] }}" width="60%" alt="Lỗi load ảnh">
    <br>
    <hr>
    @endforeach
</div>
@endsection
