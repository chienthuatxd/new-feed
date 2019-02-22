@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">URL</th>
                    <th scope="col">View</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($feeds as $feed)
                    <tr>
                        <th scope="row">{{ $feed->id + 1 }}</th>
                        <td>{{ $feed->title }}</td>
                        <td>{{ $feed->url }}</td>
                        <td><a href="{{ route('feeds.show', $feed->id) }}">View</a></td>
                        <td>
                            <form action="{{ route('feeds.destroy', $feed->id)}}" method="post">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('feeds.create') }}">Add New Feed</a>
    </div>
</div>
@endsection
