@extends('admin.layouts.admin')

@section('title', 'Edit User')

@section('content')

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/color.css')}}">

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit User</h1>
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


                <!-- Content
                ================================================== -->
                <div class="container">
                    <div class="row">


                        <!-- Widget -->
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <form action="{{route('adminUser.update', $user->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-md-8 my-profile">
                                        <label>Your Name</label>
                                        <input value="{{$user->username}}" name="username" type="text">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                {{ $errors->first('username') }}
                                            </div>
                                        @endif
                                        <label>Your Title</label>
                                        <input value="{{$user->title}}" name="title" type="text">
                                        @if ($errors->any())
                                            <div class="alert alert-danger" style="color: red; margin-bottom: 10px">
                                                {{ $errors->first('title') }}
                                            </div>
                                        @endif
                                        <label>Phone</label>
                                        <input value="{{$user->phone}}" name="phone" type="text">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                {{ $errors->first('phone') }}
                                            </div>
                                        @endif
                                        <label>Email</label>
                                        <input value="{{$user->email}}" name="email"  type="text">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                {{ $errors->first('email') }}
                                            </div>
                                        @endif

                                        <h4 class="margin-top-50 margin-bottom-25">About Me</h4>
                                        <textarea name="about" id="about" cols="30" rows="10">{{$user->about}}</textarea>
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                {{ $errors->first('about') }}
                                            </div>
                                        @endif
                                        <input style="display: none" value="{{$user->id}}" name="userId" type="text">

                                        <button class="button margin-top-20 margin-bottom-20">Save Changes</button>
                                    </div>

                                    <div class="edit-profile-photo">
                                        <div class="change-photo-btn">
                                            <div class="photoUpload">
                                                <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                <input name="image" type="file" class="upload"/>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            </form>
                        </div>



                    </div>


                </div>

            </div>

    </div>
    </section>
    </div>

@endsection
