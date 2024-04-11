@extends('layouts.app')

@section('title', 'My properties')

@section('content')


    <!-- Titlebar
================================================== -->
    <div id="titlebar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h2>My Properties</h2>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li>My Properties</li>
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
                            <li><a href="{{route('bookmark.index')}}" ><i class="sl sl-icon-star"></i> Bookmarked Listings</a></li>
                        </ul>

                        <ul class="my-account-nav">
                            <li class="sub-nav-title">Manage Listings</li>
                            <li><a href="{{route('my-properties')}}" class="current"><i class="sl sl-icon-docs"></i> My Properties</a></li>
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
                <table class="manage-table responsive-table">

                    <tr>
                        <th><i class="fa fa-file-text"></i> Property</th>
                        <th class="expire-date"><i class="fa fa-calendar"></i> Expiration Date</th>
                        <th></th>
                    </tr>

                    @foreach(Auth::user()->properties as $property)
                        <x-my-property :property="$property"></x-my-property>
                    @endforeach

                </table>
                <a href="{{route('property.create')}}" class="margin-top-40 button">Submit New Property</a>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"
            integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <script>
        function submitEdit(e){
            const propertyId = $(e).data('id');
            $('#editForm'+propertyId).submit();
        }

        function submitHide(e){
            const propertyId = $(e).data('id');
            $('#hideForm'+propertyId).submit();
        }

        function submitDelete(e){
            const propertyId = $(e).data('id');
            $('#deleteForm'+propertyId).submit();
        }

        function submitActivate(e){
            const propertyId = $(e).data('id');
            $('#activateForm'+propertyId).submit();
        }
    </script>

@endsection
