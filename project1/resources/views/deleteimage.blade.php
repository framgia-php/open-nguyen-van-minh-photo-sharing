@extends('layouts.master')
@section('title','Xoa anh')


@section('content')
<div id="div1" class="col-sm-10 sidenav" style="padding-left: 200px; background-color: white; padding-top: 50px;">
<form action="/project1/public/images/{{ $image->image_id }}" method="POST">
    {!! csrf_field() !!}
    {{ method_field('DELETE') }}
    <label>Bạn có thực sự muốn xóa ảnh? </label>
    <hr>
    <img src="{{ url('/') . '/images/' . $image->path }}" width="60%" alt="Lỗi load ảnh">
    <input type="hidden" name="imageId" value="{{ $image->image_id }}">
    <hr>
    <button class="btn btn-primary">Xóa</button>
    <br/>
    <br/>
</form>
</div>
@endsection
