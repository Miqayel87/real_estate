@extends('layouts.app')

@section('title', 'submit-property')


@section('content')

    <!-- Titlebar
    ================================================== -->
    <div id="titlebar" class="submit-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2><i class="fa fa-plus-circle"></i> Add Property</h2>
                </div>
            </div>
        </div>
    </div>


    <!-- Content
        ================================================== -->
    <div class="container">
        <div class="row">
            <form action="{{ route('property.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- Submit Page -->
                <div class="col-md-12">
                    <div class="submit-page">

                        <div class="notification notice large margin-bottom-55">
                            <h4>Don't Have an Account?</h4>
                            <p>If you don't have an account you can create one by entering your email address in contact
                                details section. A password will be automatically emailed to you.</p>
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

                        <!-- Section -->
                        <h3>Basic Information</h3>
                        <div class="submit-section">
                            <!-- Title -->
                            <div class="form">
                                <h5>Property Title <i class="tip"
                                                      data-tip-content="Type title that will also contains an unique feature of your property (e.g. renovated, air contidioned)"></i>
                                </h5>
                                <input name="title" class="search-field" type="text" value=""/>
                            </div>

                            <!-- Row -->
                            <div class="row with-forms">

                                <!-- Status -->
                                <div class="col-md-6">
                                    <h5>Status</h5>
                                    <select name="listing_type" class="chosen-select-no-single">
                                        <option label="blank"></option>
                                        @foreach($listingTypes as $listingType)
                                            <option value="{{$listingType}}">{{$listingType}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Type -->
                                <div class="col-md-6">
                                    <h5>Type</h5>
                                    <select name="type" class="chosen-select-no-single">
                                        <option label="blank"></option>
                                        @foreach($types as $type)
                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <!-- Row / End -->


                            <!-- Row -->
                            <div class="row with-forms">

                                <!-- Price -->
                                <div class="col-md-4">
                                    <h5>Price <i class="tip"
                                                 data-tip-content="Type overall or monthly price if property is for rent"></i>
                                    </h5>
                                    <div class="select-input disabled-first-option">
                                        <input name="price" type="text" data-unit="USD">
                                    </div>
                                </div>

                            </div>
                            <!-- Row / End -->

                        </div>
                        <!-- Section / End -->


                        <!-- Section -->
                        <h3>Gallery</h3>
                        <div class="submit-section">
                            <form action="/file-upload" class="dropzone"></form>
                            <input type="file" name="images[]" id="">
                            <input type="file" name="images[]" id="">
                            <input type="file" name="images[]" id="">
                            <input type="file" name="images[]" id="">
                            <input type="file" name="images[]" id="">
                        </div>
                        <!-- Section / End -->

                        <!-- Section -->
                        <h3>Location</h3>
                        <div class="submit-section">

                            <!-- Row -->
                            <div class="row with-forms">

                                <!-- Address -->
                                <div class="col-md-6">
                                    <h5>Address</h5>
                                    <input name="address" type="text">
                                </div>

                                <!-- City -->
                                <div class="col-md-6">
                                    <h5>City</h5>
                                    <input name="city" type="text">
                                </div>

                                <!-- City -->
                                <div class="col-md-6">
                                    <h5>State</h5>
                                    <input name="state" type="text">
                                </div>

                                <!-- Zip-Code -->
                                <div class="col-md-6">
                                    <h5>Zip-Code</h5>
                                    <input name="zip_code" type="text">
                                </div>

                            </div>
                            <!-- Row / End -->

                        </div>
                        <!-- Section / End -->


                        <!-- Section -->
                        <h3>Detailed Information</h3>
                        <div class="submit-section">

                            <!-- Description -->
                            <div class="form">
                                <h5>Description</h5>
                                <textarea name="description" class="WYSIWYG" cols="40" rows="3" id="summary"
                                          spellcheck="true"></textarea>
                            </div>

                            <!-- Row -->
                            <div class="row with-forms">
                                @foreach($hasValueFeatures['features'] as $feature)
                                    @if(isset($hasValueFeatures['values'][$feature->name]))
                                        <div class="col-md-4">
                                            <h5>{{$feature->name}} <span>(optional)</span></h5>
                                            <select name="features[{{$feature->id}}]" class="chosen-select-no-single">
                                                <option label="blank"></option>
                                                @foreach($hasValueFeatures['values'][$feature->name] as $value)
                                                    <option value="{{$value}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @else
                                        <div class="col-md-4">
                                            <h5>{{$feature->name}}</h5>
                                            <div class="select-input disabled-first-option">
                                                <input name="features[{{$feature->id}}]" type="text" data-unit="Sq Ft">
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <!-- Row / End -->


                            <!-- Checkboxes -->
                            <h5 class="margin-top-30">Other Features <span>(optional)</span></h5>
                            <div class="checkboxes in-row margin-bottom-20">

                                @foreach($noValueFeatures as $index => $feature)
                                    <input id="check-{{$index}}" type="checkbox" value="{{true}}"
                                           name="features[{{$feature->id}}]">
                                    <label for="check-{{$index}}">{{$feature->name}}</label>
                                @endforeach

                            </div>
                            <!-- Checkboxes / End -->

                        </div>
                        <!-- Section / End -->


                        <!-- Section -->
                        <h3>Contact Details</h3>
                        <div class="submit-section">

                            <!-- Row -->
                            <div class="row with-forms">

                                <!-- Name -->
                                <div class="col-md-4">
                                    <h5>Name</h5>
                                    <input name="name" type="text">
                                </div>

                                <!-- Email -->
                                <div class="col-md-4">
                                    <h5>E-Mail</h5>
                                    <input name="email" type="text">
                                </div>

                                <!-- Name -->
                                <div class="col-md-4">
                                    <h5>Phone <span>(optional)</span></h5>
                                    <input name="phone" type="text">
                                </div>

                            </div>
                            <!-- Row / End -->

                        </div>
                        <!-- Section / End -->


                        <div class="divider"></div>
                        <button  class="button preview margin-top-5" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
