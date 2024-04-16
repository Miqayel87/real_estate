@extends('layouts.app')

@section('title', $property->title)

@section('content')

    <!-- Titlebar
================================================== -->
    <div id="titlebar" class="property-titlebar margin-bottom-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <a href="{{route('listing')}}" class="back-to-listings"></a>
                    <div class="property-title">
                        <h2>{{$property->title}} <span
                                class="property-badge">{{$property->listing_type?'For rent':'For sale'}}</span></h2>
                        <span>
						<a href="#location" class="listing-address">
							<i class="fa fa-map-marker"></i>
							{{$property->zip_code}} {{$property->address}}  {{$property->city}} , {{$property->state}}
						</a>
					</span>
                    </div>

                    <div class="property-pricing">
                        <div class="property-price">${{number_format($property->price)}} </div>
                        <div class="sub-price">
                            ${{number_format($property->price/$property->features[array_search('Area', array_column($property->features->toArray(), 'name'))]->pivot->value, 2)}}
                            / sq ft
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>


    <!-- Content
    ================================================== -->
    <div class="container">
        <div class="row margin-bottom-50">
            <div class="col-md-12">

                <!-- Slider -->
                <div class="property-slider default">
                    @foreach($property->images as $image)
                        <a href="{{asset('storage/'.$image->name)}}"
                           data-background-image="{{asset('storage/'.$image->name)}}" class="item mfp-gallery"></a>
                    @endforeach
                </div>

                <!-- Slider Thumbs -->
                <div class="property-slider-nav">
                    @foreach($property->images as $image)
                        <div class="item"><img src="{{asset('storage/'.$image->name)}}" alt=""></div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">

            <!-- Property Description -->
            <div class="col-lg-8 col-md-7 sp-content">
                <div class="property-description">

                    <!-- Main Features -->
                    <ul class="property-main-features">
                        @foreach($property->features as $feature)
                            @if($feature->has_value)
                                <li>{{$feature->name}} <span>{{$feature->pivot->value}}</span></li>
                            @endif
                        @endforeach
                    </ul>


                    <!-- Description -->
                    <h3 class="desc-headline">Description</h3>
                    <div class="show-more">
                        <p>
                            {{$property->description}}
                        </p>

                        {{--                        <p>--}}
                        {{--                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra a. Aliquam pellentesque nibh et nibh feugiat gravida. Maecenas ultricies, diam vitae semper placerat, velit risus accumsan nisl, eget tempor lacus est vel nunc. Proin accumsan elit sed neque euismod fringilla. Curabitur lobortis nunc velit, et fermentum urna dapibus non. Vivamus magna lorem, elementum id gravida ac, laoreet tristique augue. Maecenas dictum lacus eu nunc porttitor, ut hendrerit arcu efficitur.--}}
                        {{--                        </p>--}}

                        {{--                        <p>--}}
                        {{--                            Nam mattis lobortis felis eu blandit. Morbi tellus ligula, interdum sit amet ipsum et, viverra hendrerit lectus. Nunc efficitur sem vel est laoreet, sed bibendum eros viverra. Vestibulum finibus, ligula sed euismod tincidunt, lacus libero lobortis ligula, sit amet molestie ipsum purus ut tortor. Nunc varius, dui et sollicitudin facilisis, erat felis imperdiet felis, et iaculis dui magna vitae diam. Donec mattis diam nisl, quis ullamcorper enim malesuada non. Curabitur lobortis eu mauris nec vestibulum. Nam efficitur, ex ac semper malesuada, nisi odio consequat dui, hendrerit vulputate odio dui vitae massa. Aliquam tortor urna, tincidunt ut euismod quis, semper vel ipsum. Ut non vestibulum mauris. Morbi euismod, felis non hendrerit viverra, nunc sapien bibendum ligula, eget vehicula nunc dolor eu ex. Quisque in semper odio. Donec auctor blandit ligula. Integer id lectus non nibh vulputate efficitur quis at arcu.--}}
                        {{--                        </p>--}}

                        <a href="#" class="show-more-button">Show More <i class="fa fa-angle-down"></i></a>
                    </div>

                    <!-- Features -->
                    <h3 class="desc-headline">Features</h3>
                    <ul class="property-features checkboxes margin-top-0">
                        @foreach($property->features as $feature)
                            @if(!$feature->has_value)
                                <li>{{$feature->name}}</li>
                            @endif
                        @endforeach
                    </ul>

                    @if($location)
                        <!-- Location -->
                        <h3 class="desc-headline no-border" id="location">Location</h3>
                        <div id="propertyMap-container">
                            <div id="propertyMap" data-latitude="{{$location['latitude']}}"
                                 data-longitude="{{$location['longitude']}}"></div>
                            <a href="#" id="streetView">Street View</a>
                        </div>
                    @endif

                    <!-- Similar Listings Container -->
                    <h3 class="desc-headline no-border margin-bottom-35 margin-top-60">Similar Properties</h3>

                    <!-- Layout Switcher -->

                    <div class="layout-switcher hidden"><a href="#" class="list"><i class="fa fa-th-list"></i></a></div>
                    <div class="listings-container list-layout">
                        @foreach($similarProperties as $similarProperty)
                            <x-property :property="$similarProperty"></x-property>
                        @endforeach
                    </div>
                    <!-- Similar Listings Container / End -->

                </div>
            </div>
            <!-- Property Description / End -->


            <!-- Sidebar -->
            <div class="col-lg-4 col-md-5 sp-sidebar">
                <div class="sidebar sticky right">

                    <!-- Widget -->
                    <div class="widget margin-bottom-30">
                        @if(Auth::user())
                            @if(array_search($property->id, array_column(Auth::user()->bookmarks->toArray(), 'property_id')) !== false)
                                <button data-id="{{$property->id}}" class="bookmark widget-button with-tip liked"
                                        data-tip-content="Add to Bookmarks"><i class="fa fa-star-o"></i></button>
                            @else
                                <button data-id="{{$property->id}}" class="bookmark widget-button with-tip"
                                        data-tip-content="Add to Bookmarks"><i class="fa fa-star-o"></i></button>
                            @endif
                        @endif
                        <div class="clearfix"></div>
                    </div>
                    <!-- Widget / End -->


                    <!-- Widget -->
                    <div class="widget">

                        <!-- Agent Widget -->
                        <div class="agent-widget">
                            <div class="agent-title">
                                <div class="agent-photo"><img src="{{asset($property->user->image?'storage/resized/'.$property->user->image->name:'images/default-profile-photo.jpg')}}" alt=""/></div>
                                <div class="agent-details">
                                    <h4>{{$property->user->username}}</h4>
                                    @if($property->user->phone)
                                        <span><i class="sl sl-icon-call-in"></i>{{$property->user->phone}}</span>
                                    @endif
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <form action="{{route('mail.send', $property->id)}}" method="post">
                                @csrf
                                <input name="email" type="text" placeholder="Your Email"
                                       pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$">
                                <input name="phone" type="text" placeholder="Your Phone">
                                <input style="display: none" name="from" type="text" value="{{$property->user->email}}">
                                <textarea name="mailContent">I'm interested in this property [property {{$property->id}}] and I'd like to know more details.</textarea>
                                <button type="submit" class="button fullwidth margin-top-5">Send Message</button>
                            </form>
                        </div>
                        <!-- Agent Widget / End -->

                    </div>
                    <!-- Widget / End -->


                </div>
            </div>
            <!-- Sidebar / End -->

        </div>
    </div>
    <!-- Date Range Picker - docs: http://www.daterangepicker.com/ -->
    <script src="{{asset('scripts/moment.min.js')}}"></script>
    <script src="{{asset('scripts/daterangepicker.js')}}"></script>
    <script>
        // Calendar Init
        $(function () {
            $('#date-picker').daterangepicker({
                "opens": "left",
                singleDatePicker: true,

                // Disabling Date Ranges
                isInvalidDate: function (date) {
                    // Disabling Date Range
                    var disabled_start = moment('09/02/2018', 'MM/DD/YYYY');
                    var disabled_end = moment('09/06/2018', 'MM/DD/YYYY');
                    return date.isAfter(disabled_start) && date.isBefore(disabled_end);

                    // Disabling Single Day
                    // if (date.format('MM/DD/YYYY') == '08/08/2018') {
                    //     return true;
                    // }
                }
            });
        });

        // Calendar animation
        $('#date-picker').on('showCalendar.daterangepicker', function (ev, picker) {
            $('.daterangepicker').addClass('calendar-animated');
        });
        $('#date-picker').on('show.daterangepicker', function (ev, picker) {
            $('.daterangepicker').addClass('calendar-visible');
            $('.daterangepicker').removeClass('calendar-hidden');
        });
        $('#date-picker').on('hide.daterangepicker', function (ev, picker) {
            $('.daterangepicker').removeClass('calendar-visible');
            $('.daterangepicker').addClass('calendar-hidden');
        });
    </script>


    <!-- Replacing dropdown placeholder with selected time slot -->
    <script>
        $(".time-slot").each(function () {
            var timeSlot = $(this);
            $(this).find('input').on('change', function () {
                var timeSlotVal = timeSlot.find('strong').text();

                $('.panel-dropdown.time-slots-dropdown a').html(timeSlotVal);
                $('.panel-dropdown').removeClass('active');
            });
        });
    </script>

@endsection
