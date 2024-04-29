@extends('admin.layouts.admin')

@section('title', 'Edit Feature')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div>
                <h2>Edit Feature</h2>
            </div>
            <form action="{{route('feature.update',$feature->id)}}" method="post">
                @csrf
                @method('PUT')
                <div>
                    <div style="margin-bottom: 20px">
                        <input value="{{$feature->name}}" type="text" name="name" placeholder="name">
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <div style="margin-bottom: 20px">
                        <label for="has_value">Has value</label>
                        <input {{$feature->has_value?'checked':''}} id="has_value" type="checkbox" name="has_value">
                    </div>
                    <div>
                        <button type="submit">Edit</button>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection
