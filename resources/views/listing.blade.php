@extends('layouts.app')

@section('title', 'Listing')

@section('listing', 'current')
@section('home', '')

@section('content')
    <!-- Titlebar
                            ================================================== -->
    <div class="parallax titlebar" data-background="images/listings-parallax.jpg" data-color="#333333"
         data-color-opacity="0.7"
         data-img-width="800" data-img-height="505">
        <form action="{{ route('listing.search') }}" method="get">


            <div id="titlebar">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">

                            <h2>Listings</h2>
                            <span>Grid Layout With Sidebar</span>

                            <!-- Breadcrumbs -->
                            <nav id="breadcrumbs">
                                <ul>
                                    <li><a href="{{route('home')}}">Home</a></li>
                                    <li>Listings</li>
                                </ul>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
    </div>


    <!-- Content
                            ================================================== -->
    <div class="container">
        <form class="row sticky-wrapper">

            <div class="col-md-8">
                <!-- Main Search Input -->
                <div class="main-search-input margin-bottom-35">
                    <input  name="keyword" type="text" class="ico-01"
                           placeholder="Enter address e.g. street, city and state or zip"
                           value="{{isset($searchOptions['keyword'])?$searchOptions['keyword']:''}}"/>
                    <button type="submit" class="search button">Search</button>
                </div>

                <!-- Sorting / Layout Switcher -->
                <div class="row margin-bottom-15">

                    <div class="col-md-6">
                        <!-- Sort by -->
                        <div class="sort-by">
                            <label>Sort by:</label>

                            <div class="sort-by-select">
                                <select name="sorting" data-placeholder="Default order"
                                        class="chosen-select-no-single">
                                    <option value="">Default Order</option>
                                    <option {{isset($searchOptions['sorting']) && ($searchOptions['sorting'] == 'asc-price') ? 'selected':''}} value="asc-price">Price Low to High</option>
                                    <option {{isset($searchOptions['sorting']) && ($searchOptions['sorting'] == 'desc-price') ? 'selected':''}} value="desc-price">Price High to Low</option>
                                    <option {{isset($searchOptions['sorting']) && ($searchOptions['sorting'] == 'desc') ? 'selected':''}} value="desc">Newest Properties</option>
                                    <option {{isset($searchOptions['sorting']) && ($searchOptions['sorting'] == 'asc') ? 'selected':''}} value="asc">Oldest Properties</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <!-- Layout Switcher -->
                        <div class="layout-switcher">
                            <a href="#" class="grid"><i class="fa fa-th-large"></i></a>
                            <a href="#" class="list"><i class="fa fa-th-list"></i></a>
                        </div>
                    </div>
                </div>


                <!-- Listings -->
                <div class="listings-container grid-layout">
                    <!-- Listing Item -->
                    @foreach ($properties as $property)
                        <x-property :property="$property"></x-property>
                    @endforeach
                    <!-- Listing Item / End -->
                </div>

                <div class="pagination-container margin-top-20">
                    <nav class="pagination">
                        <ul>
                            <!-- Display pagination links dynamically -->
                            {{ $properties->links('pagination::bootstrap-4') }}
                        </ul>
                    </nav>

                </div>
                <!-- Pagination / End -->

            </div>


            <!-- Sidebar
                                    ================================================== -->
            <div class="col-md-4">
                <div class="sidebar sticky right">

                    <!-- Widget -->
                    <div class="widget margin-bottom-40">
                        <h3 class="margin-top-0 margin-bottom-35">Find New Home</h3>
                        <!-- Row -->
                        <div class="row with-forms">
                            <!-- Status -->
                            <div class="col-md-12">
                                <select name="listing_type" data-placeholder="Any Status"
                                        class="chosen-select-no-single">
                                    <option value="">Any Status</option>
                                    @foreach ($listingTypes as $index => $listingType)
                                        <option
                                            {{isset($searchOptions['listing_type']) && ($searchOptions['listing_type'] == $index) ? 'selected':''}}
                                            value="{{ $index }}">{{ $listingType }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- Row / End -->

                        <!-- Row -->
                        <div class="row with-forms">
                            <!-- Type -->
                            <div class="col-md-12">
                                <select name="type" data-placeholder="Any Type" class="chosen-select-no-single">
                                    <option value="">Any Type</option>
                                    @foreach ($types as $type)
                                        <option
                                            {{isset($searchOptions['type']) && ($searchOptions['type'] == $type->id) ? 'selected':''}} value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- Row / End -->

                        <!-- Row -->
                        <div class="row with-forms">
                            <!-- States -->
                            <div class="col-md-12">
                                <select name="state" data-placeholder="All States" class="chosen-select">
                                    <option value="">All States</option>

                                    @foreach($searchOptions['states'] as $stateOption)
                                        <option
                                            {{isset($searchOptions['state']) && ($searchOptions['state'] == $stateOption) ? 'selected':''}}  value="{{$stateOption}}">{{$stateOption}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- Row / End -->

                        <!-- Row -->
                        <div class="row with-forms">
                            <!-- Cities -->
                            <div class="col-md-12">
                                <select name="city" data-placeholder="All Cities" class="chosen-select">
                                    <option value="">All Cities</option>

                                    @foreach($searchOptions['cities'] as $cityOption)
                                        <option
                                            {{isset($searchOptions['city']) && ($searchOptions['city'] == $cityOption) ? 'selected':''}} value="{{$cityOption}}">{{$cityOption}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- Row / End -->


                        <!-- Row -->
                        <div class="row with-forms">

                            <!-- Min Area -->
                            <div class="col-md-6">
                                <select name="bedrooms" data-placeholder="Beds" class="chosen-select-no-single">
                                    <option label="blank"></option>
                                    <option value="">Beds (Any)</option>

                                    @foreach($searchOptions['bedroomOptions'] as $bedroomOption)
                                        <option
                                            {{isset($searchOptions['bedrooms']) && ($searchOptions['bedrooms'] == $bedroomOption) ? 'selected':''}} value="{{$bedroomOption}}">{{$bedroomOption}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Max Area -->
                            <div class="col-md-6">
                                <select name="bathrooms" data-placeholder="Baths" class="chosen-select-no-single">
                                    <option label="blank"></option>
                                    <option value="">Baths (Any)</option>

                                    @foreach($searchOptions['bathroomOptions'] as $bathroomOption)
                                        <option
                                            {{isset($searchOptions['bathrooms']) && ($searchOptions['bathrooms'] == $bathroomOption) ? 'selected':''}} value="{{$bathroomOption}}">{{$bathroomOption}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- Row / End -->

                        <br>

                        <!-- Area Range -->
                        <div class="range-slider">
                            <label>Area Range</label>
                            <div id="area-range" data-min="0" data-max="1500" data-unit="sq ft">
                                <input type="text" style="display: none" class="range first-slider-value"
                                       name="minArea">
                                <input type="text" style="display: none" class="range second-slider-value"
                                       name="maxArea">
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <br>

                        <!-- Price Range -->
                        <div class="range-slider">
                            <label>Price Range</label>
                            <div name='price' id="price-range" data-min="0" data-max="400000" data-unit="$">
                                <input type="text" style="display: none" class="range first-slider-value"
                                       name="minPrice">
                                <input type="text" style="display: none" class="range second-slider-value"
                                       name="maxPrice">
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <!-- More Search Options -->
                        <a href="#" class="more-search-options-trigger margin-bottom-10 margin-top-30"
                           data-open-title="Additional Features" data-close-title="Additional Features"></a>
                        <div class="more-search-options relative">
                            <!-- Checkboxes -->
                            <div class="checkboxes one-in-row margin-bottom-10">
                                @foreach ($features as $feature)
                                    <input
                                        {{ isset($searchOptions['features']) && array_search($feature->id, $searchOptions['features']) !== false ? 'checked' : '' }}
                                            value="{{$feature->id}}"
                                        id="{{ $feature->id }}" type="checkbox"
                                        name="features[]">
                                    <label for="{{ $feature->id }}">{{ $feature->name }}</label>
                                @endforeach
                            </div>
                            <!-- Checkboxes / End -->

                        </div>
                        <!-- More Search Options / End -->
                        <button class="search button fullwidth margin-top-30">Search</button>
                    </div>
                    <!-- Widget / End -->
                </div>
            </div>
            <!-- Sidebar / End -->
    </div>
    </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"
            integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>

    <script>
        $($('.search')).click(() => {
            const range = $('.range').toArray();

            range.forEach(element => {
                $(element).val($(element).val().replace('$', ""));
                $(element).val($(element).val().replace(',', ""));
                $(element).val($(element).val().replace('sq ft', ''));
            });
        });
    </script>
@endsection
