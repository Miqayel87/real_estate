@extends('admin.layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div>
                <h2>Add Type</h2>
            </div>
            <form action="{{route('type.store')}}" method="post">
                @csrf
                <div>
                    <div style="margin-bottom: 20px">
                        <input type="text" name="name" placeholder="name">
                    </div>
                    @if ($errors->first('name'))
                        <div class="alert alert-danger">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <div style="margin-bottom: 20px">
                        <input type="text" name="description" placeholder="description">
                    </div>
                    @if ($errors->first('description'))
                        <div class="alert alert-danger">
                            {{ $errors->first('description') }}
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
