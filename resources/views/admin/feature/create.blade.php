@extends('admin.layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div>
                <h2>Add Feature</h2>
            </div>
            <form action="{{route('feature.store')}}" method="post">
                @csrf
                <div>
                    <div style="margin-bottom: 20px">
                        <input value="{{old('name')}}" type="text" name="name" placeholder="name">
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <div style="margin-bottom: 20px">
                        <label for="has_value">Has value</label>
                        <input {{old('has_value')?'checked':''}} id="has_value" type="checkbox" name="has_value">
                    </div>
                    <div>
                        <button type="submit">Add</button>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection
