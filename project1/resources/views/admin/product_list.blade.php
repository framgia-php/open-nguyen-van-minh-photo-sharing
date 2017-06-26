@extends('layouts.admin')
@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Path</th>
                                <th>Scope</th>
                                <th>Description</th>
                                <th>User_id</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        @foreach($images as $image)
                        <tbody>
                            <tr class="odd gradeX" align="center">
                                <td> {{ $image->image_id }}</td>
                                <td> {{ $image->path }}</td>
                                @if($image->scope == 0)
                                    <td> Public </td>
                                @else
                                    <td> Only me</td>
                                @endif
                                <td> {{ $image->description }}</td>
                                <td> {{ $image->user_id }}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection
