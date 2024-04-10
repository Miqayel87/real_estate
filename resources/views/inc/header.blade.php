<!-- Compare Properties Widget
================================================== -->
<div class="compare-slide-menu">

    <div class="csm-trigger"></div>

    <div class="csm-content">
        <h4>Compare Properties
            <div class="csm-mobile-trigger"></div>
        </h4>

        <div class="csm-properties">

            <!-- Property -->
            <div class="listing-item compact">
                <a href="single-property-page-2.html" class="listing-img-container">
                    <div class="remove-from-compare"><i class="fa fa-close"></i></div>
                    <div class="listing-badges">
                        <span>For Sale</span>
                    </div>
                    <div class="listing-img-content">
                        <span class="listing-compact-title">Eagle Apartments <i>$420,000</i></span>
                    </div>
                    <img src="images/listing-01.jpg" alt="">
                </a>
            </div>

            <!-- Property -->
            <div class="listing-item compact">
                <a href="single-property-page-2.html" class="listing-img-container">
                    <div class="remove-from-compare"><i class="fa fa-close"></i></div>
                    <div class="listing-badges">
                        <span>For Sale</span>
                    </div>
                    <div class="listing-img-content">
                        <span class="listing-compact-title">Selway Apartments <i>$420,000</i></span>
                    </div>
                    <img src="images/listing-03.jpg" alt="">
                </a>
            </div>

            <!-- Property -->
            <div class="listing-item compact">
                <a href="single-property-page-2.html" class="listing-img-container">
                    <div class="remove-from-compare"><i class="fa fa-close"></i></div>
                    <div class="listing-badges">
                        <span>For Sale</span>
                    </div>
                    <div class="listing-img-content">
                        <span class="listing-compact-title">Oak Tree Villas <i>$535,000</i></span>
                    </div>
                    <img src="images/listing-05.jpg" alt="">
                </a>
            </div>

        </div>

        <div class="csm-buttons">
            <a href="compare-properties.html" class="button">Compare</a>
            <a href="#" class="button reset">Reset</a>
        </div>
    </div>

</div>
<!-- Compare Properties Widget / End -->


<!-- Header Container
================================================== -->
<header id="header-container">

    <!-- Topbar -->
    <div id="top-bar">
        <div class="container">

            <!-- Left Side Content -->
            <div class="left-side">

                <!-- Top bar -->
                <ul class="top-bar-menu">
                    <li><i class="fa fa-phone"></i> (123) 123-456</li>
                    <li><i class="fa fa-envelope"></i> <a href="#">office@example.com</a></li>
                </ul>

            </div>
            <!-- Left Side Content / End -->


        </div>
    </div>
    <div class="clearfix"></div>
    <!-- Topbar / End -->


    @if(!Auth::user())
        <!-- Header -->
        <div id="header">
            <div class="container">

                <!-- Left Side Content -->
                <div class="left-side">

                    <!-- Logo -->
                    <div id="logo">
                        <a href="{{route('home')}}"><img src="{{asset('images/logo.png')}}" alt=""></a>
                    </div>


                    <!-- Mobile Navigation -->
                    <div class="mmenu-trigger">
                        <button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
                        </button>
                    </div>


                    <!-- Main Navigation -->
                    <nav id="navigation" class="style-1">
                        <ul id="responsive">
                            <li><a class="current" href="{{route('home')}}">Home</a></li>
                            <li><a href="{{route('listing')}}">Listings</a></li>
                        </ul>
                    </nav>
                    <div class="clearfix"></div>
                    <!-- Main Navigation / End -->
                </div>
                <!-- Left Side Content / End -->

                <!-- Right Side Content / End -->
                <div class="right-side">
                    <!-- Header Widget -->
                    <div class="header-widget">
                        <a href="{{route('login')}}" class="sign-in"><i class="fa fa-user"></i> Log In / Register</a>
                        <a href="{{route('property.create')}}" class="button border">Submit Property</a>
                    </div>
                    <!-- Header Widget / End -->
                </div>
                <!-- Right Side Content / End -->
            </div>
        </div>
    @else
        <!-- Header -->
        <div id="header">
            <div class="container">

                <!-- Left Side Content -->
                <div class="left-side">

                    <!-- Logo -->
                    <div id="logo">
                        <a href="{{route('home')}}"><img src="images/logo.png" alt=""></a>
                    </div>

                    <!-- Mobile Navigation -->
                    <div class="mmenu-trigger">
                        <button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
                        </button>
                    </div>

                    <!-- Main Navigation -->
                    <nav id="navigation" class="style-1">
                        <ul id="responsive">
                            <li><a class="current" href="{{route('home')}}">Home</a></li>
                            <li><a href="{{route('listing')}}">Listings</a></li>
                        </ul>
                    </nav>
                    <div class="clearfix"></div>
                    <!-- Main Navigation / End -->
                </div>
                <!-- Left Side Content / End -->

                <!-- Right Side Content / End -->
                <div class="right-side">
                    <!-- Header Widget -->
                    <div class="header-widget">
                        <!-- User Menu -->
                        <div class="user-menu">
                            <div class="user-name"><span>
                                @if(Auth::user()->image)
                                        <img src="{{asset('storage/resized/'.Auth::user()->image->name)}}" alt="">
                                    @else
                                        <img src="{{asset('images/default-profile-photo.jpg')}}" alt="">
                                    @endif
                                </span>Hi, {{Auth::user()->username}}!
                            </div>
                            <ul>
                                <li><a href="{{route('my-profile')}}"><i class="sl sl-icon-user"></i> My Profile</a>
                                </li>
                                <li><a href="{{route('bookmark.index')}}"><i class="sl sl-icon-star"></i> Bookmarks</a>
                                </li>
                                <li><a href="{{route('my-properties')}}"><i class="sl sl-icon-docs"></i> My
                                        Properties</a></li>
                                <li id="logout"><a href="#"><i class="sl sl-icon-power"></i> Log Out</a></li>
                                <form id="logoutForm" style="display: none" action="{{route('logout')}}"
                                      method="POST">@csrf</form>
                            </ul>
                        </div>

                        <a href="{{route('property.create')}}" class="button border">Submit Property</a>
                    </div>
                    <!-- Header Widget / End -->
                </div>
                <!-- Right Side Content / End -->
            </div>
        </div>
        <!-- Header / End -->
    @endif
    <!-- Header / End -->
</header>
<div class="clearfix"></div>
<!-- Header Container / End -->

<script>
    document.getElementById('logout').addEventListener('click', () => {
        document.getElementById('logoutForm').submit();
    })
</script>
