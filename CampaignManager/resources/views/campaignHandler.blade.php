@extends('layout.index')

@section('center')

    <div>{{ $campaign['name'] }}</div>

    <div>
        @foreach($products as $product)
            <img src="{{ Storage::url('images/' . $product['image'])}}" alt="" width="100" height="100">
            <p>{{ $product->name }}</p>
        @endforeach
    </div>

    <div>
        @foreach($posts as $post)
            <a href="">{{$post->title}}</a>
        @endforeach
    </div>

    <div>
        @foreach($coupons as $coupon)
            <p>{{$coupon->name}}</p>
        @endforeach
    </div>

    <form action="">
        <div>
            <select name="status">
                <option value="approved">elfogadott</option>
                <option value="not accepted">nem elfogadott</option>
            </select>
        </div>
    </form>

    <form action="">
        <button type="submit">Start</button>
    </form>

    <form action="">
        <button type="submit">Stop</button>
    </form>
@endsection
