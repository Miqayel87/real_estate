@extends('admin.layouts.admin')

@section('title', 'Edit Article')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div>
                <h2>Edit Article</h2>
            </div>
            <form action="{{route('article.update', $article->id)}}" method="post">
                @csrf
                @method('PUT')
                <div>
                    <div style="margin-bottom: 20px">
                        <input value="{{$article->name}}" type="text" name="name" placeholder="name">
                    </div>
                    @if ($errors->first('name'))
                        <div class="alert alert-danger" >
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <div style="margin-bottom: 20px">
                        <input value="{{$article->content}}" type="text" name="content" placeholder="content">
                    </div>
                    @if ($errors->first('content'))
                        <div class="alert alert-danger" >
                            {{ $errors->first('content') }}
                        </div>
                    @endif
                    <div>
                        <button type="submit">Edit</button>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection
