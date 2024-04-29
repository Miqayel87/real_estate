@extends('admin.layouts.admin')

@section('title', 'Users')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                            <li class="breadcrumb-item active">DataTables</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Users Table</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                @foreach($users[0]->getAttributes() as $key => $value)
                                    <th>{{$key}}</th>
                                @endforeach
                                @if(isset($users[0]->images) || isset($users[0]->image))
                                    <th>Images</th>
                                @endif
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $key => $user)
                                <tr>
                                    @foreach($user->getAttributes() as $value)
                                        <td>{{$value}}</td>
                                    @endforeach
                                    @if($user->image)
                                        <td>
                                            <div id="image{{$user->image->id}}">
                                                <img style="margin: 20px" width="100px" height="100px"
                                                     src="{{asset('storage/resized/'.$user->image->name)}}"
                                                     alt="">
                                            </div>
                                        </td>
                                    @endif
                                    <td>
                                        <form action="{{route("adminUser.destroy", $user->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button>Delete</button>
                                        </form>
                                        <form action="{{route("adminUser.edit", $user->id)}}">
                                            <button>Edit</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <form action="{{route("adminUser.create")}}">
                            <button type="submit">Add</button>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </section>
    </div>
@endsection
