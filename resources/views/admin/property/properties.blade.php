@extends('admin.layouts.admin')

@section('title', 'properties')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>DataTables</h1>
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
                        <h3 class="card-title">Properties Table</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                @foreach($properties[0]->getAttributes() as $key => $value)
                                    <th>{{$key}}</th>
                                @endforeach
                                @if(isset($properties[0]->images) || isset($properties[0]->image))
                                    <th>Images</th>
                                @endif
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($properties as $key => $property)
                                <tr>
                                    @foreach($property->getAttributes() as $value)
                                        <td>{{$value}}</td>
                                    @endforeach
                                    @if($property->images)
                                        <td>
                                            @foreach($property->images as $image)
                                                <div id="image{{$image->id}}">
                                                    <img style="margin: 20px" width="100px" height="100px"
                                                         src="{{asset('storage/resized/'.$image->name)}}"
                                                         alt="">
                                                </div>
                                            @endforeach
                                        </td>
                                    @endif
                                    <td>
                                        <form action="{{route("adminProperty.destroy", $property->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button>Delete</button>
                                        </form>
                                        <form action="{{route("adminProperty.edit", $property->id)}}">
                                            <button>Edit</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <form action="{{route("adminProperty.create")}}">
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
