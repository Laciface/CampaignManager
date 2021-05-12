@extends('layout.index')

@section('center')
    <div>
        <div>{{$post->title}}</div>
        <div>{{$post->post}}</div>
    </div>
@endsection
