@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <a href="{{ route('feeds.index') }}">Back To List Feed</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Published Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($itemList as $key => $item)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td><a href="{{ $item['link'] }}">{{ $item['title'] }}</a></td>
                        <td>{{ $item['pubDate'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('feeds.index') }}">Back To List Feed</a>
    </div>
</div>
@endsection
