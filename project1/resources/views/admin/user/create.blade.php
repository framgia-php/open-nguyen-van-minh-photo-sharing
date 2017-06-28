@extends('layouts.admin')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Add User
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @foreach ($errors->all() as $error)
                        <h2 style="color: red">{{ $error }}</h2>
                    @endforeach
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="create" method="POST" >
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" name="name" placeholder="Please Enter Username" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Please Enter Password"/>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Please Enter Email" />
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
                            <button type="submit" class="btn btn-default">User Add</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection
