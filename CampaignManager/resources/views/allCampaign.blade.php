@extends('layout.index')

@section('center')

<div id="campaignContainer">
    @foreach($campaigns as $campaign)
        @if($campaign->is_running)
        <div class="campaignCard active">
            <p>{{$campaign->name}}</p>
            <p>{{$campaign->first_day}} - {{$campaign->last_day}}</p>
            <a href="/campaignHandler/{{$campaign->id}}">Megtekint</a>
        </div>
        @else
            <div class="campaignCard">
                <p>{{$campaign->name}}</p>
                <p>{{$campaign->first_day}} - {{$campaign->last_day}}</p>
                <a href="/campaignHandler/{{$campaign->id}}">Megtekint</a>
            </div>
        @endif
    @endforeach
</div>

@endsection
