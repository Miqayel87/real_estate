@extends('admin.layouts.admin')


@section('title', 'Add Property')

@section('content')

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/color.css')}}">

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>DataTables</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                            <li class="breadcrumb-item active">DataTables</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">


                <!-- Content
       ================================================== -->
                <div class="container">
                    <div class="row">
                        <form id="submitForm" action="{{ route('adminProperty.store') }}" method="post"
                              enctype="multipart/form-data">
                            @csrf

                            <!-- Submit Page -->
                            <div class="col-md-12">
                                <div class="submit-page">
                                    <!-- Section -->
                                    <h3>Basic Information</h3>
                                    <div class="submit-section">
                                        <!-- Title -->
                                        <div class="form">
                                            <h5>Property Title <i class="tip"
                                                                  data-tip-content="Type title that will also contains an unique feature of your property (e.g. renovated, air contidioned)"></i>
                                            </h5>
                                            <input name="title" class="search-field" type="text"
                                                   value="{{old('title')}}"/>
                                            @if ( $errors->first('title') )
                                                <div class="alert alert-danger">
                                                    {{ $errors->first('title') }}
                                                </div>
                                            @endif
                                        </div>
                                        <!-- Row -->
                                        <div class="row with-forms">

                                            <!-- Status -->
                                            <div class="col-md-6">
                                                <h5>Status</h5>
                                                <select name="listing_type" class="chosen-select-no-single">
                                                    <option label="blank"></option>
                                                    @foreach($listingTypes as $index => $listingType)
                                                        <option
                                                            {{old('listing_type') == $index ?'selected':''}} value="{{$index}}">{{$listingType}}</option>
                                                    @endforeach
                                                </select>
                                                @if ( $errors->first('listing_type') )
                                                    <div class="alert alert-danger">
                                                        {{ $errors->first('listing_type') }}
                                                    </div>
                                                @endif
                                            </div>

                                            <!-- Type -->
                                            <div class="col-md-6">
                                                <h5>Type</h5>
                                                <select name="type" class="chosen-select-no-single">
                                                    <option label="blank"></option>
                                                    @foreach($types as $type)
                                                        <option
                                                            {{old('type') == $type->id ?'selected':''}} value="{{$type->id}}">{{$type->name}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->first('type'))
                                                    <div class="alert alert-danger">
                                                        {{ $errors->first('type') }}
                                                    </div>
                                                @endif
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
                                                    <input name="price" type="text" data-unit="USD"
                                                           value="{{old('price')}}">
                                                    @if ($errors->any())
                                                        <div class="alert alert-danger">
                                                            {{ $errors->first('price') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Row / End -->

                                    </div>
                                    <!-- Section / End -->
                                    <form action="{{route('file-upload')}}" enctype="multipart/form-data"
                                          class="dropzone" id="">
                                        @csrf
                                    </form>
                                    <h3>Gallery</h3>
                                    <div class="submit-section">
                                        <form action="{{route('file-upload')}}" enctype="multipart/form-data"
                                              class="dropzone" id="dropzone">
                                            @csrf
                                        </form>
                                        @if ($errors->first('imageIds'))
                                            <div class="alert alert-danger">
                                                {{ $errors->first('imageIds') }}
                                            </div>
                                        @endif
                                        {{--<input style="display: none" type="file" name="images[]" id="">--}}
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
                                                <input name="address" type="text" value="{{old('address')}}">
                                                @if ($errors->first('address'))
                                                    <div class="alert alert-danger">
                                                        {{ $errors->first('address') }}
                                                    </div>
                                                @endif
                                            </div>

                                            <!-- City -->
                                            <div class="col-md-6">
                                                <h5>City</h5>
                                                <input name="city" type="text" value="{{old('city')}}">
                                                @if ($errors->first('city'))
                                                    <div class="alert alert-danger">
                                                        {{ $errors->first('city') }}
                                                    </div>
                                                @endif
                                            </div>

                                            <!-- City -->
                                            <div class="col-md-6">
                                                <h5>State</h5>
                                                <input name="state" type="text" value="{{old('state')}}">
                                                @if ($errors->first('state'))
                                                    <div class="alert alert-danger">
                                                        {{ $errors->first('state') }}
                                                    </div>
                                                @endif
                                            </div>

                                            <!-- Zip-Code -->
                                            <div class="col-md-6">
                                                <h5>Zip-Code</h5>
                                                <input name="zip_code" type="text" value="{{old('zip_code')}}">
                                                @if ($errors->first('zip_code'))
                                                    <div class="alert alert-danger">
                                                        {{ $errors->first('zip_code') }}
                                                    </div>
                                                @endif
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
                                                      spellcheck="true">{{old('description')}}</textarea>
                                            @if ($errors->first('description'))
                                                <div class="alert alert-danger">
                                                    {{ $errors->first('description') }}
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Row -->
                                        <div class="row with-forms">
                                            @foreach($hasValueFeatures['features'] as $feature)
                                                @if(isset($hasValueFeatures['values'][$feature->name]))
                                                    <div class="col-md-4">
                                                        <h5>{{$feature->name}}</h5>
                                                        <select name="features[{{$feature->id}}]"
                                                                class="chosen-select-no-single">
                                                            <option label="blank"></option>
                                                            @foreach($hasValueFeatures['values'][$feature->name] as $value)
                                                                <option
                                                                    {{ old('features.'.$feature->id) == $value ? 'selected' : '' }} value="{{$value}}">{{$value}}</option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->first('features.'.$feature->id))
                                                            <div class="alert alert-danger">
                                                                {{ $errors->first('features.'.$feature->id) }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                @else
                                                    <div class="col-md-4">
                                                        <h5>{{$feature->name}}</h5>
                                                        <div class="select-input disabled-first-option">
                                                            <input value="{{old('features.'.$feature->id)}}"
                                                                   name="features[{{$feature->id}}]" type="text"
                                                                   data-unit="Sq Ft">
                                                        </div>
                                                        @if ($errors->first('features.'.$feature->id))
                                                            <div class="alert alert-danger">
                                                                {{ $errors->first('features.'.$feature->id) }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <!-- Row / End -->


                                        <!-- Checkboxes -->
                                        <h5 class="margin-top-30">Other Features <span>(optional)</span></h5>
                                        <div class="checkboxes in-row margin-bottom-20">

                                            @foreach($noValueFeatures as $index => $feature)
                                                <input
                                                    {{old('features.'.$feature->id)?'checked':''}} id="check-{{$index}}"
                                                    type="checkbox" value="{{true}}"
                                                    name="features[{{$feature->id}}]">
                                                <label for="check-{{$index}}">{{$feature->name}}</label>
                                                @if ($errors->first('features.'.$feature->id))
                                                    <div class="alert alert-danger">
                                                        {{ $errors->first('features.'.$feature->id) }}
                                                    </div>
                                                @endif
                                            @endforeach

                                        </div>
                                        <!-- Checkboxes / End -->

                                        <!-- User -->
                                        <div class="col-md-12">
                                            <h5>User</h5>
                                            <select name="user" class="chosen-select-no-single">
                                                <option label="blank"></option>
                                                @foreach($users as $user)
                                                    <option
                                                        {{old('user') == $user->id ?'selected':''}} value="{{$user->id}}">{{$user->username}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->first('user'))
                                                <div class="alert alert-danger">
                                                    {{ $errors->first('user') }}
                                                </div>
                                            @endif
                                        </div>

                                    </div>
                                    <!-- Section / End -->
                                    <div class="divider"></div>
                                    <div style="margin-bottom: 50px">
                                        <button id="btn" class="button preview margin-top-5" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </section>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- DropZone | Documentation: http://dropzonejs.com -->
    <script type="text/javascript" src="{{asset('scripts/dropzone.js')}}"></script>

    <script>
        $('#btn').on('click', () => {
            if (Dropzone.forElement("#dropzone")) {
                Dropzone.forElement("#dropzone").files.forEach(function (file, index) {
                    $('#submitForm').elements['files'] = file;
                });
            }
        });

        Dropzone.options.dropzone = {
            paramName: 'file',
            maxFilesize: 100,
            acceptedFiles: '.jpg, .jpeg, .png',
            init: function() {
                this.on('success', function(file, response) {
                    console.log('File ID:', response.id);
                    $('#submitForm').append(`<input hidden name='imageIds[]' value='${response.id}'></input>`)
                });
            }
        };

    </script>

@endsection
