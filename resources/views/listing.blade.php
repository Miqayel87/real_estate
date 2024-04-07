@extends('layouts.app')

@section('content')
    <!-- Titlebar
                        ================================================== -->
    <div class="parallax titlebar" data-background="images/listings-parallax.jpg" data-color="#333333" data-color-opacity="0.7"
        data-img-width="800" data-img-height="505">

        <div id="titlebar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <h2>Listings</h2>
                        <span>Grid Layout With Sidebar</span>

                        <!-- Breadcrumbs -->
                        <nav id="breadcrumbs">
                            <ul>
                                <li><a href="#">Home</a></li>
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
        <div class="row sticky-wrapper">

            <div class="col-md-8">

                <!-- Main Search Input -->
                <div class="main-search-input margin-bottom-35">
                    <input type="text" class="ico-01" placeholder="Enter address e.g. street, city and state or zip"
                        value="" />
                    <button class="button">Search</button>
                </div>

                <!-- Sorting / Layout Switcher -->
                <div class="row margin-bottom-15">

                    <div class="col-md-6">
                        <!-- Sort by -->
                        <div class="sort-by">
                            <label>Sort by:</label>

                            <div class="sort-by-select">
                                <select data-placeholder="Default order" class="chosen-select-no-single">
                                    <option>Default Order</option>
                                    <option>Price Low to High</option>
                                    <option>Price High to Low</option>
                                    <option>Newest Properties</option>
                                    <option>Oldest Properties</option>
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

                {{--                <!-- Pagination --> --}}
                {{--                <div class="pagination-container margin-top-20"> --}}
                {{--                    <nav class="pagination"> --}}
                {{--                        <ul> --}}
                {{--                            <li><a href="#" class="current-page">1</a></li> --}}
                {{--                            <li><a href="#">2</a></li> --}}
                {{--                            <li><a href="#">3</a></li> --}}
                {{--                            <li class="blank">...</li> --}}
                {{--                            <li><a href="#">22</a></li> --}}
                {{--                        </ul> --}}
                {{--                    </nav> --}}

                {{--                    <nav class="pagination-next-prev"> --}}
                {{--                        <ul> --}}
                {{--                            <li><a href="#" class="prev">Previous</a></li> --}}
                {{--                            <li><a href="#" class="next">Next</a></li> --}}
                {{--                        </ul> --}}
                {{--                    </nav> --}}
                {{--                </div> --}}
                <!-- Pagination -->

                <div class="pagination-container margin-top-20">
                    <nav class="pagination">
                        <ul>
                            <!-- Display pagination links dynamically -->
                            {{ $properties->links('pagination::bootstrap-4') }}
                        </ul>
                    </nav>

                    {{--                    <!-- Optionally, you can include previous and next buttons --> --}}
                    {{--                    <nav class="pagination-next-prev"> --}}
                    {{--                        <ul> --}}
                    {{--                            <li class="{{ ($properties->currentPage() == 1) ? 'disabled' : '' }}"> --}}
                    {{--                                <a href="{{ $properties->previousPageUrl() }}" class="prev">Previous</a> --}}
                    {{--                            </li> --}}
                    {{--                            <li class="{{ ($properties->currentPage() == $properties->lastPage()) ? 'disabled' : '' }}"> --}}
                    {{--                                <a href="{{ $properties->nextPageUrl() }}" class="next">Next</a> --}}
                    {{--                            </li> --}}
                    {{--                        </ul> --}}
                    {{--                    </nav> --}}
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
                        <form action="{{ route('listing.search') }}" method="get">
                            <!-- Row -->
                            <div class="row with-forms">
                                <!-- Status -->
                                <div class="col-md-12">
                                    <select name="listing_type" data-placeholder="Any Status"
                                        class="chosen-select-no-single">
                                        <option>Any Status</option>
                                        @foreach ($listingTypes as $listingType)
                                            <option value="{{ $listingType }}">{{ $listingType }}</option>
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
                                        <option>Any Type</option>
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
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
                                        <option>All States</option>
                                        <option>Alabama</option>
                                        <option>Alaska</option>
                                        <option>Arizona</option>
                                        <option>Arkansas</option>
                                        <option>California</option>
                                        <option>Colorado</option>
                                        <option>Connecticut</option>
                                        <option>Delaware</option>
                                        <option>Florida</option>
                                        <option>Georgia</option>
                                        <option>Hawaii</option>
                                        <option>Idaho</option>
                                        <option>Illinois</option>
                                        <option>Indiana</option>
                                        <option>Iowa</option>
                                        <option>Kansas</option>
                                        <option>Kentucky</option>
                                        <option>Louisiana</option>
                                        <option>Maine</option>
                                        <option>Maryland</option>
                                        <option>Massachusetts</option>
                                        <option>Michigan</option>
                                        <option>Minnesota</option>
                                        <option>Mississippi</option>
                                        <option>Missouri</option>
                                        <option>Montana</option>
                                        <option>Nebraska</option>
                                        <option>Nevada</option>
                                        <option>New Hampshire</option>
                                        <option>New Jersey</option>
                                        <option>New Mexico</option>
                                        <option>New York</option>
                                        <option>North Carolina</option>
                                        <option>North Dakota</option>
                                        <option>Ohio</option>
                                        <option>Oklahoma</option>
                                        <option>Oregon</option>
                                        <option>Pennsylvania</option>
                                        <option>Rhode Island</option>
                                        <option>South Carolina</option>
                                        <option>South Dakota</option>
                                        <option>Tennessee</option>
                                        <option>Texas</option>
                                        <option>Utah</option>
                                        <option>Vermont</option>
                                        <option>Virginia</option>
                                        <option>Washington</option>
                                        <option>West Virginia</option>
                                        <option>Wisconsin</option>
                                        <option>Wyoming</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Row / End -->


                            <!-- Row -->
                            <div class="row with-forms">
                                <!-- Cities -->
                                <div class="col-md-12">
                                    <select name="city" data-placeholder="All Cities" class="chosen-select">
                                        <option>All Cities</option>
                                        <option>New York</option>
                                        <option>Los Angeles</option>
                                        <option>Chicago</option>
                                        <option>Brooklyn</option>
                                        <option>Queens</option>
                                        <option>Houston</option>
                                        <option>Manhattan</option>
                                        <option>Philadelphia</option>
                                        <option>Phoenix</option>
                                        <option>San Antonio</option>
                                        <option>Bronx</option>
                                        <option>San Diego</option>
                                        <option>Dallas</option>
                                        <option>San Jose</option>
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
                                    <select name="bathrooms" data-placeholder="Baths" class="chosen-select-no-single">
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

                            <br>

                            <!-- Area Range -->
                            <div class="range-slider">
                                <label>Area Range</label>
                                <div id="area-range" data-min="0" data-max="1500" data-unit="sq ft">
                                    <input type="text" hidden class="range first-slider-value" name="minArea">
                                    <input type="text" hidden class="range second-slider-value" name="maxArea">
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <br>

                            <!-- Price Range -->
                            <div class="range-slider">
                                <label>Price Range</label>
                                <div name='price' id="price-range" data-min="0" data-max="400000" data-unit="$">
                                    <input type="text" hidden class="range first-slider-value" name="minPrice">
                                    <input type="text" hidden class="range second-slider-value" name="maxPrice">
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
                                        <input value="{{ $feature->id }}" id="{{ $feature->id }}" type="checkbox"
                                            name="features[]">
                                        <label for="{{ $feature->id }}">{{ $feature->name }}</label>
                                    @endforeach
                                </div>
                                <!-- Checkboxes / End -->

                            </div>
                            <!-- More Search Options / End -->

                            <button id="search" class="button fullwidth margin-top-30">Search</button>

                        </form>
                    </div>
                    <!-- Widget / End -->

                </div>
            </div>
            <!-- Sidebar / End -->
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>

    <script>
        $('#search').click(() => {
            const range = $('.range').toArray();

            range.forEach(element => {
                $(element).val($(element).val().replace(/\$/g, ""));
                $(element).val($(element).val().replace('sq ft', ''));
            });
        });
    </script>
@endsection
