@extends('layouts.admin')
@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Edit</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{ url('/') . '/admin/users/' . $user->id . '/delete'}}" method="POST">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" name="name" value="{{ $user->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value=" {{ $user->email }}" disabled />
                            </div>
                            <div class="form-group">
                                <label>User Level</label>
                                <label class="radio-inline">
                                    <input name="role" value="1" checked="" type="radio">Admin
                                </label>
                                <label class="radio-inline">
                                    <input name="role" value="2" type="radio">Member
                                </label>
                            </div>
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
