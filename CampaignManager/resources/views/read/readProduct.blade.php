@extends('layout.index')

@section('center')
    <div>
        @foreach($product as $item)
            <div class="center">
                <label class="label" for="name">Termék neve</label>
                <div class="text">{{$item->name}}</div>
                <img class="image" src="{{ Storage::url('images/' . $item['picture'])}}" alt="" width="300" height="300"> <br>
                <label class="label" for="price">Termék ára</label>
                <div class="text">{{$item->price}} Ft</div>
                <label class="label" for="description">Termékleírás</label>
                <div class="text">{{$item->description}}</div>
            </div>
        @endforeach
    </div>
@endsection
