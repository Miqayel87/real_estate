@extends('layouts.app')

@section('title', 'edit-property')


@section('content')

    <!-- Titlebar
    ================================================== -->
    <div id="titlebar" class="submit-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2><i class="fa fa-plus-circle"></i> Edit Property</h2>
                </div>
            </div>
        </div>
    </div>


    <!-- Content
        ================================================== -->
    <div class="container">
        <div class="row">
            <form action="{{ route('property.update', $property->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
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
                                <input name="title" class="search-field" type="text" value="{{$property->title}}"/>
                            </div>

                            <!-- Row -->
                            <div class="row with-forms">

                                <!-- Status -->
                                <div class="col-md-6">
                                    <h5>Status</h5>
                                    <select name="listing_type" class="chosen-select-no-single">
                                        @foreach($listingTypes as $listingType)
                                            @if($property->listing_type === $listingType)
                                                <option selected value="{{$listingType}}">{{$listingType}}</option>
                                            @else
                                                <option value="{{$listingType}}">{{$listingType}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Type -->
                                <div class="col-md-6">
                                    <h5>Type</h5>
                                    <select name="type" class="chosen-select-no-single">
                                        <option label="blank"></option>
                                        @foreach($types as $type)
                                            @if($property->type->name === $type->name)
                                                <option selected value="{{$type->id}}">{{$type->name}}</option>
                                            @else
                                                <option value="{{$type->id}}">{{$type->name}}</option>
                                            @endif
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
                                        <input value="{{$property->price}}" name="price" type="text" data-unit="USD">
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
                            <div class="edit-images-container">
                                @foreach($property->images as $image)
                                    <img src="{{asset('storage/'.$image->name)}}" alt="">
                                    <form action="{{route('images.delete', $image->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button style="background-color: red; border: none; color: #FFFFFF">x</button>
                                    </form>
                                @endforeach
                            </div>
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
                                    <input value="{{$property->address}}" name="address" type="text">
                                </div>

                                <!-- City -->
                                <div class="col-md-6">
                                    <h5>City</h5>
                                    <input value="{{$property->city}}" name="city" type="text">
                                </div>

                                <!-- City -->
                                <div class="col-md-6">
                                    <h5>State</h5>
                                    <input value="{{$property->state}}" name="state" type="text">
                                </div>

                                <!-- Zip-Code -->
                                <div class="col-md-6">
                                    <h5>Zip-Code</h5>
                                    <input value="{{$property->zip_code}}" name="zip_code" type="text">
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
                                <textarea name="description" class="WYSIWYG" cols="40" rows="3" id="summary" spellcheck="true">{{$property->description}}
                                </textarea>
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
                                                    @if($property->features[array_search($feature->name, array_column($property->features->toArray(), 'name'))]->pivot->value == $value)
                                                        <option selected value="{{$value}}">{{$value}}</option>
                                                    @else
                                                        <option value="{{$value}}">{{$value}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    @else
                                        <div class="col-md-4">
                                            <h5>{{$feature->name}}</h5>
                                            <div class="select-input disabled-first-option">
                                                <input value="{{$property->features[array_search($feature->name, array_column($property->features->toArray(), 'name'))]->pivot->value}}" name="features[{{$feature->id}}]" type="text" data-unit="Sq Ft">
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
                                    @if(array_search($feature->name, array_column($property->features->toArray(), 'name')))
                                        <input checked id="check-{{$index}}" type="checkbox" value="{{true}}"
                                               name="features[{{$feature->id}}]">
                                        <label for="check-{{$index}}">{{$feature->name}}</label>
                                    @else
                                        <input id="check-{{$index}}" type="checkbox" value="{{true}}"
                                               name="features[{{$feature->id}}]">
                                        <label for="check-{{$index}}">{{$feature->name}}</label>
                                    @endif
                                @endforeach

                            </div>
                            <!-- Checkboxes / End -->

                        </div>
                        <!-- Section / End -->

                        <div class="divider"></div>
                        <a href="#" class="button preview margin-top-5">Preview <i
                                class="fa fa-arrow-circle-right"></i></a>
                        <button type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <style>
        .edit-images-container{
            width: 100%;
            display: flex;
            height: 100px;
            gap: 10px;
            margin-bottom: 20px;
        }
    </style>

@endsection
