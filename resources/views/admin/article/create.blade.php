@extends('admin.layouts.admin')

@section('title', 'Add Article')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div>
                <h2>Add Article</h2>
            </div>
            <form action="{{route('article.store')}}" method="post">
                @csrf
                <div>
                    <div style="margin-bottom: 20px">
                        <input value="{{old('name')}}" type="text" name="name" placeholder="name">
                    </div>
                    @if ($errors->first('name'))
                        <div class="alert alert-danger" >
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <div style="margin-bottom: 20px">
                        <input value="{{old('content')}}" type="text" name="content" placeholder="content">
                    </div>
                    @if ($errors->first('content'))
                        <div class="alert alert-danger" >
                            {{ $errors->first('content') }}
                        </div>
                    @endif
                    <div>
                        <button type="submit">Add</button>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection
