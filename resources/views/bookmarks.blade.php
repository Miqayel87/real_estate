@extends('layouts.app')

@section('title', 'Bookmarks')

@section('content')

    <!-- Titlebar
================================================== -->
    <div id="titlebar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h2>Bookmarked Listings</h2>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li>Bookmarked Listings</li>
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
                            <li><a href="{{route('my-profile')}}" ><i class="sl sl-icon-user"></i> My Profile</a>
                            </li>
                            <li><a href="{{route('bookmark.index')}}" class="current"><i class="sl sl-icon-star"></i> Bookmarked Listings</a></li>
                        </ul>

                        <ul class="my-account-nav">
                            <li class="sub-nav-title">Manage Listings</li>
                            <li><a href="{{route('my-properties')}}"><i class="sl sl-icon-docs"></i> My Properties</a></li>
                            <li><a href="{{route('property.create')}}"><i class="sl sl-icon-action-redo"></i> Submit New
                                    Property</a></li>
                        </ul>

                        <ul class="my-account-nav">
                            <li><a class="logout"><i class="sl sl-icon-power"></i> Log Out</a></li>
                        </ul>

                    </div>

                </div>
            </div>

            <div class="col-md-8">
                <table class="manage-table bookmarks-table responsive-table">

                    <tr>
                        <th><i class="fa fa-file-text"></i> Property</th>
                        <th></th>
                    </tr>
                    <!-- Items -->
                    @foreach($properties as $property)
                        <x-bookmark-property :property="$property"></x-bookmark-property>
                    @endforeach
                </table>
            </div>

        </div>
    </div>
@endsection
