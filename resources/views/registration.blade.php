@extends('layouts.app')

@section('title', 'Registration')

@section('content')

    <!-- Titlebar
================================================== -->
    <div id="titlebar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h2>Log In & Register</h2>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li>Log In & Register</li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>


    <!-- Contact
    ================================================== -->

    <!-- Container -->
    <div class="container">

        <div class="row">
            <div class="col-md-4 col-md-offset-4">

                <button class="button social-login via-twitter"><i class="fa fa-twitter"></i> Log In With Twitter
                </button>
                <button class="button social-login via-gplus"><i class="fa fa-google-plus"></i> Log In With Google Plus
                </button>
                <button class="button social-login via-facebook"><i class="fa fa-facebook"></i> Log In With Facebook
                </button>

                <!--Tab -->
                <div class="my-account style-1 margin-top-5 margin-bottom-40">

                    <ul class="tabs-nav">
                        <li><a href="{{route('registration')}}">Register</a></li>
                        <li class=""><a href="{{route('login')}}">Log In</a></li>
                    </ul>

                    <div class="tabs-container alt">
                        <!-- Register -->
                        <div class="tab-content" id="tab2" style="display: none;">

                            <form method="POST" class="register" action="{{route('sign-up')}}">
                                @csrf
                                <p class="form-row form-row-wide">
                                    <label for="username2">Username:
                                        <i class="im im-icon-Male"></i>
                                        <input type="text" class="input-text" name="username" id="username2" value="{{old('username')}}"/>
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
                                        <input type="text" class="input-text" name="email" id="email2" value="{{old('email')}}"/>
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
                                        <input class="input-text" type="password" name="password" id="password1"/>
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
                                        <input class="input-text" type="password" name="password_confirmation"
                                               id="password2"/>
                                    </label>
                                </p>

                                <p class="form-row">
                                    <input type="submit"  class="button border fw margin-top-10" name="register"
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
@endsection
