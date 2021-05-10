@extends('layout.index')

@section('center')

<div>
    @foreach($campaigns as $campaign)
        <div>
            <p>{{$campaign->name}}</p>
            <a href="/campaignHandler/{{$campaign->id}}">Megtekint</a>
        </div>
    @endforeach
</div>

@endsection
