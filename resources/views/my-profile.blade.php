@extends('layouts.app')

@section('title', 'my-profile')

@section('content')

    <!-- Titlebar
================================================== -->
    <div id="titlebar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h2>My Profile</h2>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li>My Profile</li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>


    <!-- Content
    ================================================== -->
    <div class="container">
        <div class="row">


            <!-- Widget -->
            <div class="col-md-4">
                <div class="sidebar left">

                    <div class="my-account-nav-container">

                        <ul class="my-account-nav">
                            <li class="sub-nav-title">Manage Account</li>
                            <li><a href="my-profile.html" class="current"><i class="sl sl-icon-user"></i> My Profile</a>
                            </li>
                            <li><a href="my-bookmarks.html"><i class="sl sl-icon-star"></i> Bookmarked Listings</a></li>
                        </ul>

                        <ul class="my-account-nav">
                            <li class="sub-nav-title">Manage Listings</li>
                            <li><a href="my-properties.html"><i class="sl sl-icon-docs"></i> My Properties</a></li>
                            <li><a href="submit-property.html"><i class="sl sl-icon-action-redo"></i> Submit New
                                    Property</a></li>
                        </ul>

                        <ul class="my-account-nav">
                            <li><a href="change-password.html"><i class="sl sl-icon-lock"></i> Change Password</a></li>
                            <li><a href="#"><i class="sl sl-icon-power"></i> Log Out</a></li>
                        </ul>

                    </div>

                </div>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style="color: red">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-md-8">
                <div class="row">
                    <form action="{{route('user.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-8 my-profile">
                            <h4 class="margin-top-0 margin-bottom-30">My Account</h4>

                            <label>Your Name</label>
                            <input name="username" value="{{$user->username}}" type="text">

                            <label>Your Title</label>
                            <input name="title" value="{{$user->title}}" type="text">

                            <label>Phone</label>
                            <input name="phone" value="{{$user->phone}}" type="text">

                            <label>Email</label>
                            <input name="email" value="{{$user->email}}" type="text">


                            <h4 class="margin-top-50 margin-bottom-25">About Me</h4>
                            <textarea name="about" id="about" cols="30" rows="10">{{$user->about}}</textarea>


                            <h4 class="margin-top-50 margin-bottom-0">Social</h4>

                            <label><i class="fa fa-twitter"></i> Twitter</label>
                            <input value="https://www.twitter.com/" type="text">

                            <label><i class="fa fa-facebook-square"></i> Facebook</label>
                            <input value="https://www.facebook.com/" type="text">

                            <label><i class="fa fa-google-plus"></i> Google+</label>
                            <input value="https://www.google.com/" type="text">

                            <label><i class="fa fa-linkedin"></i> Linkedin</label>
                            <input value="https://www.linkedin.com/" type="text">


                            <button class="button margin-top-20 margin-bottom-20">Save Changes</button>
                        </div>

                        <div class="col-md-4">
                            <!-- Avatar -->
                            <div class="edit-profile-photo">
                                @if(Auth::user()->image)
                                    <img src="{{ asset('storage/'.$user->image->name) }}" alt="">
                                @else
                                    <img src="{{asset('images/default-profile-photo.jpg')}}" alt="">
                                @endif
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


                <div>
                    <h3> Submitted Properties</h3>

                    <div class="listings-container grid-layout">
                        <!-- Listing Item -->
                        @foreach($user->properties as $property)
                            <div style="display: flex; flex-direction: column; margin-bottom: 50px">
                                <x-property :property="$property"></x-property>

                                @if($property->status)
                                    <div class="action_container">
                                        <form action="{{route('property.destroy', $property->id)}}"
                                              method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="action_button action_delete">Delete</button>
                                        </form>
                                        <form action="{{route('property.edit', $property->id)}}"
                                              method="get">
                                            @csrf
                                            <button class="action_button action_edit">Edit</button>
                                        </form>
                                    </div>
                                @else
                                    <div class="action_container">
                                        <form action="{{route('property.activate', $property->id)}}"
                                              method="post">
                                            @csrf
                                            @method('PATCH')
                                            <button class="action_button action_activate">Activate</button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                        <!-- Listing Item / End -->
                    </div>
            </div>


            </div>

        </div>

        <style>
            .action_container {
                display: flex;
                padding: 0 15px;
                gap: 20px;
            }

            .action_button{
                font-size: 15px;
                color: #FFFFFF;
                border-radius: 10px;
                border: none;
                padding: 5px 10px ;
            }

            .action_delete{
                background-color: #bf2f29;
            }

            .action_edit{
                background-color: #0b7bb5;
            }

            .action_activate{
                background-color: #79ba38;
            }
        </style>
@endsection
