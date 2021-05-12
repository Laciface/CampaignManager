@extends('layout.index')

@section('center')
    <div>
        @foreach($post as $item)
            <div class="center">
                <label class="label" for="title">Poszt címe</label>
                <div class="text">{{$item->title}}</div>
                <label class="label" for="description">Poszt bejegyzés</label>
                <div class="text">{{$item->post}}</div>
            </div>
        @endforeach
    </div>
@endsection


