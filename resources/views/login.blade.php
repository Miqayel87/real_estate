@extends('layouts.app')

@section('title', 'Login')

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
                        <li class=""><a href="{{route('login')}}">Log In</a></li>
                        <li><a href="{{route('registration')}}">Register</a></li>
                    </ul>

                    <div class="tabs-container alt">

                        <!-- Login -->
                        <div class="tab-content" id="tab1" style="display: none;">
                            <form method="post" class="login" action="{{route('login')}}">
                                @csrf
                                <p class="form-row form-row-wide">
                                    <label for="username">Username:
                                        <i class="im im-icon-Male"></i>
                                        <input type="text" class="input-text" name="username" id="username" value="{{old('username')}}"/>
                                    </label>
                                </p>

                                <p class="form-row form-row-wide">
                                    <label for="password">Password:
                                        <i class="im im-icon-Lock-2"></i>
                                        <input class="input-text" type="password" name="password" id="password"/>
                                    </label>
                                </p>

                                @if ($errors->any())
                                    <div class="alert alert-danger" style="color: red; margin-bottom: 10px">
                                            @foreach ($errors->all() as $error)
                                                {{ $error }}
                                            @endforeach
                                    </div>
                                @endif

                                <p class="form-row">
                                    <input type="submit" class="button border margin-top-10" name="login"
                                           value="Login"/>

                                    <label for="rememberme" class="rememberme">
                                        <input name="remember" type="checkbox" id="rememberme" value="forever"/>
                                        Remember Me</label>
                                </p>

                                <p class="lost_password">
                                    <a href="#">Lost Your Password?</a>
                                </p>

                            </form>
                        </div>



                        </div>



                    </div>
                </div>


            </div>
        </div>

    </div>
    <!-- Container / End -->
@endsection
