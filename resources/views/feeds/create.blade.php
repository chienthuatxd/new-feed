@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('feeds.index') }}">Back To List Feed</a>
    <h3>Create New Feed</h3>
    <div class="row justify-content-center">
        <form method="post" action="{{ route('feeds.store') }}" style="width: 50%">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <div class="form-group">
                {{ csrf_field() }}
                <label for="name">Title:</label>
                <input type="text" class="form-control" name="title" value="{{ old('title') }}"/>
            </div>
            <div class="form-group">
                <label for="price">Url Rss Feed :</label>
                <input type="text" class="form-control" name="url" value="{{ old('url') }}"/>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>

    </div>
</div>
@endsection
