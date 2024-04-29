@extends('admin.layouts.admin')

@section('title', 'Types')

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
                        <h3 class="card-title">Types Table</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                @foreach($types[0]->getAttributes() as $key => $value)
                                    <th>{{$key}}</th>
                                @endforeach
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($types as $key => $type)
                                <tr>
                                    @foreach($type->getAttributes() as $value)
                                        <td>{{$value}}</td>
                                    @endforeach
                                    <td>
                                        <form action="{{route("type.destroy", $type->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button>Delete</button>
                                        </form>
                                        <form action="{{route("type.edit", $type->id)}}">
                                            <button>Edit</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <form action="{{route("type.create")}}">
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
