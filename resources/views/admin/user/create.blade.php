@extends('admin.layouts.admin')

@section('title', 'Add User')

@section('content')

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/color.css')}}">

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create User</h1>
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
                                <form action="{{route('adminUser.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-8 my-profile">

                                        <label>Your Name</label>
                                        <input name="username" type="text">
                                        @if ($errors->any())
                                            <div class="alert alert-danger" style="color: red; margin-bottom: 10px">
                                                {{ $errors->first('username') }}
                                            </div>
                                        @endif
                                        <label>Your Title</label>
                                        <input name="title" type="text">
                                        @if ($errors->any())
                                            <div class="alert alert-danger" style="color: red; margin-bottom: 10px">
                                                {{ $errors->first('title') }}
                                            </div>
                                        @endif
                                        <label>Phone</label>
                                        <input name="phone" type="text">
                                        @if ($errors->any())
                                            <div class="alert alert-danger" style="color: red; margin-bottom: 10px">
                                                {{ $errors->first('phone') }}
                                            </div>
                                        @endif
                                        <label>Email</label>
                                        <input name="email"  type="text">
                                        @if ($errors->any())
                                            <div class="alert alert-danger" style="color: red; margin-bottom: 10px">
                                                {{ $errors->first('email') }}
                                            </div>
                                        @endif

                                        <h4 class="margin-top-50 margin-bottom-25">About Me</h4>
                                        <textarea name="about" id="about" cols="30" rows="10"></textarea>
                                        @if ($errors->any())
                                            <div class="alert alert-danger" style="color: red; margin-bottom: 10px">
                                                {{ $errors->first('about') }}
                                            </div>
                                        @endif

                                        <label>Password</label>
                                        <input name="password" type="text">
                                        @if ($errors->any())
                                            <div class="alert alert-danger" style="color: red; margin-bottom: 10px">
                                                {{ $errors->first('password') }}
                                            </div>
                                        @endif
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
