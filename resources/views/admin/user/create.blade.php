@extends('admin.layouts.admin')


@section('title', 'Add Property')

@section('content')

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/color.css')}}">

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

                <!-- Container -->
                <div class="container">

                    <div class="row">
                        <div class="col-md-4 col-md-offset-4">

                            <!--Tab -->
                            <div class="my-account style-1 margin-top-5 margin-bottom-40">

                                <div class="tabs-container alt">
                                    <!-- Register -->
                                    <div class="tab-content" id="tab2" style="display: none;">

                                        <form method="POST" class="register" action="{{route('sign-up')}}">
                                            @csrf
                                            <p class="form-row form-row-wide">
                                                <label for="username2">Username:
                                                    <i class="im im-icon-Male"></i>
                                                    <input type="text" class="input-text" name="username" id="username2"
                                                           value="{{old('username')}}"/>
                                                </label>
                                            </p>
                                            @if ($errors->any())
                                                <div class="alert alert-danger" style="color: red; margin-bottom: 10px">
                                                    {{ $errors->first('username') }}
                                                </div>
                                            @endif
                                            <p class="form-row form-row-wide">
                                                <label for="email2">Email Address:
                                                    <i class="im im-icon-Mail"></i>
                                                    <input type="text" class="input-text" name="email" id="email2"
                                                           value="{{old('email')}}"/>
                                                </label>
                                            </p>
                                            @if ($errors->any())
                                                <div class="alert alert-danger" style="color: red; margin-bottom: 10px">
                                                    {{ $errors->first('email') }}
                                                </div>
                                            @endif
                                            <p class="form-row form-row-wide">
                                                <label for="password1">Password:
                                                    <i class="im im-icon-Lock-2"></i>
                                                    <input class="input-text" type="password" name="password"
                                                           id="password1"/>
                                                </label>
                                            </p>
                                            @if ($errors->any())
                                                <div class="alert alert-danger" style="color: red; margin-bottom: 10px">
                                                    {{ $errors->first('password') }}
                                                </div>
                                            @endif
                                            <p class="form-row form-row-wide">
                                                <label for="password2">Repeat Password:
                                                    <i class="im im-icon-Lock-2"></i>
                                                    <input class="input-text" type="password"
                                                           name="password_confirmation"
                                                           id="password2"/>
                                                </label>
                                            </p>

                                            <p class="form-row">
                                                <input type="submit" class="button border fw margin-top-10"
                                                       name="register"
                                                       value="Register"/>
                                            </p>

                                        </form>
                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>

                </div>
                <!-- Container / End -->

            </div>
        </section>
    </div>

@endsection
