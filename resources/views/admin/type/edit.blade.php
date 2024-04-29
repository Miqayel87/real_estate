@extends('admin.layouts.admin')

@section('title', 'Edit Type')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div>
                <h2>Edit Type</h2>
            </div>
            <form action="{{route('type.update',$type->id)}}" method="post">
                @csrf
                @method('PUT')
                <div>
                    <div style="margin-bottom: 20px">
                        <input value="{{$type->name}}" type="text" name="name" placeholder="name">
                    </div>
                    @if ($errors->first('name'))
                        <div class="alert alert-danger">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <div style="margin-bottom: 20px">
                        <input value="{{$type->description}}" type="text" name="description" placeholder="description">
                    </div>
                    <div>
                        <button type="submit">Edit</button>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection
