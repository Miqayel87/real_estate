@extends('admin.layouts.admin')]

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
                <div class="row">
                    <div class="col-12">

                        @php
                            $tableCount = 1
                        @endphp

                        @foreach($datas as $table=>$data)
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">{{$table}} Table</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example{{$tableCount++}}" class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            @foreach($data[0]->getAttributes() as $title => $value)
                                                <th>{{$title}}</th>
                                            @endforeach
                                            @if(isset($data[0]->images) || isset($data[0]->image))
                                                <th>Images</th>
                                            @endif
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $item)
                                            <tr>
                                                @foreach($item->getAttributes() as $key => $value)
                                                    <td>{{$value}}</td>
                                                @endforeach
                                                @if($item->images)
                                                    <td>
                                                        @foreach($item->images as $image)
                                                            <div id="image{{$image->id}}">
                                                                <img style="margin: 20px" width="100px" height="100px"
                                                                     src="{{asset('storage/resized/'.$image->name)}}"
                                                                     alt="">
                                                            </div>
                                                        @endforeach
                                                    </td>
                                                @endif
                                                <td>
                                                    <form action="{{route("$table.destroy", $item->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button>Delete</button>
                                                    </form>
                                                    @if($table !== 'user' && $table !== 'property')
                                                        <form action="{{route("$table.edit", $item->id)}}">
                                                            <button>Edit</button>
                                                        </form>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    @if($table !== 'user' && $table !== 'property')
                                        <form action="{{route("$table.create")}}">
                                            <button type="submit">Add</button>
                                        </form>
                                    @endif
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                        @endforeach
                    </div>
                    <!-- /.col -->

                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"
            integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <script>

        function deleteImage(e) {
            const id = $(e).data('id');
            const csrfToken = $('meta[name="csrf-token"]').attr('content');
            console.log(id)
            fetch('/images/delete/' + id, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
            })
                .then(res => res.json())
                .then(res => {
                    console.log(res)
                    $('#image' + id).slideToggle();
                })
                .catch(err => {
                    console.log(err)
                })
        }

    </script>
@endsection
