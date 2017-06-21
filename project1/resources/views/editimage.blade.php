@extends('layouts.master')
@section('title','Chinh sua anh')


@section('content')
<div id="div1" class="col-sm-10 sidenav" style="padding-left: 200px; background-color: white; padding-top: 50px;">
<form action="/project1/public/updateimage" method="POST">
  {!! csrf_field() !!}
  <div class="form-group col-sm-10" style="padding-left: 0px; font-family: cursive; font-size: 18px">
    <label>Hãy nói gì về ảnh của bạn</label>
    <textarea class="form-control" rows="5" name="description">{{ $image->description }} </textarea>
    <label>Phạm vi</label>
    <select class="form-control col-sm-5" id="sel1" name="scope">
	  @if( $image->scope == '0' )
      <option value='0'>Mọi người</option>
      <option value='1'>Chỉ mình tôi</option>
	  @else
	  <option value='1'>Chỉ mình tôi</option>
      <option value='0'>Mọi người</option>
	  @endif
    </select>
  </div>
  <br>
  <img src="{{ url('/') . '/images/' . $image->path }}" width="60%" alt="Lỗi load ảnh">
  <hr>
  <input type="hidden" name="imageId" value="{{ $image->image_id }}">
  <input type="submit" class="btn btn-danger" value="Hoàn tất">
</form>
<br/>
</div>
@endsection
