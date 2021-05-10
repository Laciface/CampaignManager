@extends('layout.index')

@section('center')

<div>
    @foreach($campaigns as $campaign)
        <div>
            {{$campaign->name}}
        </div>
    @endforeach
</div>

@endsection
