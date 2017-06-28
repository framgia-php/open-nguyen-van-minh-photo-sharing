@extends('layouts.admin')
@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
                            <small>Edit</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{ $image->image_id . '/destroy '}}" method="POST">
                            {!! csrf_field() !!}
                            <p>Bạn có thực sự muốn xóa ảnh?</p>
                            <img src="{{ $image->path}}" style="width: 50%">
                            <hr>
                            <button type="submit" class="btn btn-default">Xóa</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection
