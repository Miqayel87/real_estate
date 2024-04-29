@extends('layouts.app')

@section('title', 'Home')

@section('listing', '')
@section('home', 'current')


@section('content')

    <!-- Banner
================================================== -->
    <div class="parallax" data-background="{{asset('images/home-parallax.jpg')}}" data-color="#36383e"
         data-color-opacity="0.45" data-img-width="2500" data-img-height="1600">
        <div class="parallax-content">

            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <!-- Main Search Container -->
                        <div class="main-search-container">
                            <h2>Find Your Dream Home</h2>

                            <!-- Main Search -->
                            <form method="get" action="{{route('listing.search')}}" class="main-search-form">

                                <!-- Type -->
                                <div class="search-type">
                                    <label class="active"><input value="" class="first-tab" name="listing_type"
                                                                 checked="checked" type="radio">Any Status</label>
                                    @foreach($listingTypes as $index => $listingType)
                                        <label><input value="{{$index}}" name="listing_type"
                                                      type="radio">{{$listingType}}</label>
                                    @endforeach
                                    <div class="search-type-arrow"></div>
                                </div>


                                <!-- Box -->
                                <div class="main-search-box">

                                    <!-- Main Search Input -->
                                    <div class="main-search-input larger-input">
                                        <input name="keyword" type="text" class="ico-01" id="autocomplete-input"
                                               placeholder="Enter address e.g. street, city and state or zip" value=""/>
                                        <button class="button">Search</button>
                                    </div>

                                    <!-- Row -->
                                    <div class="row with-forms">

                                        <!-- Property Type -->
                                        <div class="col-md-4">
                                            <select name="type" data-placeholder="Any Type"
                                                    class="chosen-select-no-single">
                                                @foreach($types as $type)
                                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <!-- Min Price -->
                                        <div class="col-md-4">

                                            <!-- Select Input -->
                                            <div class="select-input">
                                                <input name="minPrice" type="text" placeholder="Min Price"
                                                       data-unit="USD">
                                            </div>
                                            <!-- Select Input / End -->

                                        </div>


                                        <!-- Max Price -->
                                        <div class="col-md-4">

                                            <!-- Select Input -->
                                            <div class="select-input">
                                                <input name="maxPrice" type="text" placeholder="Max Price"
                                                       data-unit="USD">
                                            </div>
                                            <!-- Select Input / End -->

                                        </div>

                                    </div>
                                    <!-- Row / End -->


                                    <!-- More Search Options -->
                                    <a href="#" class="more-search-options-trigger" data-open-title="More Options"
                                       data-close-title="Less Options"></a>

                                    <div class="more-search-options">
                                        <div class="more-search-options-container">

                                            <!-- Row -->
                                            <div class="row with-forms">

                                                <!-- Min Price -->
                                                <div class="col-md-6">

                                                    <!-- Select Input -->
                                                    <div class="select-input">
                                                        <input name="minArea" type="text" placeholder="Min Area"
                                                               data-unit="Sq Ft">
                                                    </div>
                                                    <!-- Select Input / End -->

                                                </div>

                                                <!-- Max Price -->
                                                <div class="col-md-6">

                                                    <!-- Select Input -->
                                                    <div class="select-input">
                                                        <input name="maxArea" type="text" placeholder="Max Area"
                                                               data-unit="Sq Ft">
                                                    </div>
                                                    <!-- Select Input / End -->

                                                </div>

                                            </div>
                                            <!-- Row / End -->


                                            <!-- Row -->
                                            <div class="row with-forms">

                                                <!-- Min Area -->
                                                <div class="col-md-6">
                                                    <select name="bedrooms" data-placeholder="Beds"
                                                            class="chosen-select-no-single">
                                                        <option label="blank"></option>
                                                        <option>Beds (Any)</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>

                                                <!-- Max Area -->
                                                <div class="col-md-6">
                                                    <select name="bathrooms" data-placeholder="Baths"
                                                            class="chosen-select-no-single">
                                                        <option label="blank"></option>
                                                        <option>Baths (Any)</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <!-- Row / End -->


                                            <!-- Checkboxes -->
                                            <div class="checkboxes in-row">
                                                @foreach($features as $feature)
                                                    <input value="{{$feature->id}}" id="{{$feature->id}}"
                                                           type="checkbox" name="features[]">
                                                    <label for="{{$feature->id}}">{{$feature->name}}</label>
                                                @endforeach
                                            </div>
                                            <!-- Checkboxes / End -->

                                        </div>
                                    </div>
                                    <!-- More Search Options / End -->


                                </div>
                                <!-- Box / End -->

                            </form>
                            <!-- Main Search -->

                        </div>
                        <!-- Main Search Container / End -->

                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- Content
    ================================================== -->
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <h3 class="headline margin-bottom-25 margin-top-65">Newly Added</h3>
            </div>

            <!-- Carousel -->
            <div class="col-md-12">
                <div class="carousel">

                    @foreach($properties as $property)
                        <x-property :property="$property" :listingTypes="$listingTypes"></x-property>
                    @endforeach

                </div>
            </div>
            <!-- Carousel / End -->

        </div>
    </div>



    <!-- Fullwidth Section -->
    <section class="fullwidth margin-top-105" data-background-color="#f7f7f7">

        <!-- Box Headline -->
        <h3 class="headline-box">What are you looking for?</h3>

        <!-- Content -->
        <div class="container">
            <div class="row">

                @foreach($types as $type)
                    <div class="col-md-3 col-sm-6">
                        <!-- Icon Box -->
                        <div class="icon-box-1">

                            <div data-id="{{$type->id}}" class="types icon-container">
                                <i class="im im-icon-Office"></i>
                                <div class="icon-links">
                                    <a>For Sale</a>
                                    <a>For Rent</a>
                                </div>
                            </div>

                            <h3>{{$type->name}}</h3>
                            <p>{{$type->description}}</p>
                        </div>
                        <form id='{{"typeForm".$type->id}}' style="display: none" action="{{route('listing.search')}}">
                            <input type="text" name="type" value="{{$type->id}}">
                        </form>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Fullwidth Section / End -->


    <!-- Container -->
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <h3 class="headline centered margin-bottom-35 margin-top-10">Most Popular Places <span>Properties In Most Popular Places</span>
                </h3>
            </div>

            @foreach($popularPlaces as $index=>$popularPlace)

                <div data-id="{{str_replace(' ', '',$popularPlace->city)}}"
                     class="popular-places col-md-{{$index%2===0?4:8}}">
                    <!-- Image Box -->
                    <a class="img-box"
                       data-background-image="{{asset('images/popular-location-01.jpg')}}">

                        <!-- Badge -->
                        <div class="listing-badges">
                            <span class="featured">Featured</span>
                        </div>

                        <div class="img-box-content visible">
                            <h4>{{$popularPlace->city}} </h4>
                            <span>{{$popularPlace->count}} Properties</span>
                        </div>
                    </a>
                    <form id='{{"popularPlaceForm".str_replace(' ', '',$popularPlace->city)}}' style="display: none"
                          action="{{route('listing.search')}}">
                        <input type="text" name="city" value="{{$popularPlace->city}}">
                    </form>
                </div>
            @endforeach

        </div>
    </div>
    <!-- Container / End -->

    <!-- Fullwidth Section -->
    <section class="fullwidth margin-top-95 margin-bottom-0">

        <!-- Box Headline -->
        <h3 class="headline-box">Articles & Tips</h3>

        <div class="container">
            <div class="row">

                <!-- Blog Post -->
                @foreach($articles as $article)
                    <div class="col-md-4">
                        <div class="blog-post">

                            <!-- Img -->
                                <img src="{{asset('images/blog-post-01.jpg')}}" alt="">

                            <!-- Content -->
                            <div class="post-content">
                                <h3><a href="#">{{$article->name}}</a></h3>
                                <p>{{$article->content}}</p>

                            </div>

                        </div>
                    </div>

                @endforeach
                <!-- Blog Post / End -->

            </div>
        </div>
    </section>
    <!-- Fullwidth Section / End -->

    <!-- Flip banner -->
    <a href="{{route('listing')}}" class="flip-banner parallax"
       data-background="{{asset('images/flip-banner-bg.jpg')}}" data-color="#274abb" data-color-opacity="0.9"
       data-img-width="2500" data-img-height="1600">
        <div class="flip-banner-content">
            <h2 class="flip-visible">We help people and homes find each other</h2>
            <h2 class="flip-hidden">Browse Properties <i class="sl sl-icon-arrow-right"></i></h2>
        </div>
    </a>
    <!-- Flip banner / End -->

    <!-- Google Autocomplete -->
    <script>
        const types = $('.types').toArray();
        types.forEach((type) => {
            const id = $(type).data('id');
            $(type).click(() => {
                $('#typeForm' + id).submit();
            })
        })

        const popularPlaces = $('.popular-places').toArray();
        popularPlaces.forEach((popularPlace) => {
            const id = $(popularPlace).data('id');
            $(popularPlace).click(() => {
                $('#popularPlaceForm' + id).submit();
            })
        })

        function initAutocomplete() {
            var input = document.getElementById('autocomplete-input');
            var autocomplete = new google.maps.places.Autocomplete(input);

            autocomplete.addListener('place_changed', function () {
                var place = autocomplete.getPlace();
                if (!place.geometry) {
                    window.alert("No details available for input: '" + place.name + "'");
                    return;
                }
            });
        }


    </script>
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initAutocomplete"></script>

@endsection
