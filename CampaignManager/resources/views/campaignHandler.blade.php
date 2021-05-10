@extends('layout.index')

@section('center')

    <h2>{{ $campaign->name }}</h2>

    <span>kampány termékei</span>
    <div>
        @if($products)
            @foreach($products as $product)
                {{--<img src="{{ Storage::url('images/' . $product['image'])}}" alt="" width="100" height="100">--}}
                <p>{{ $product->name }}</p>
            @endforeach
        @endif
    </div>
    <div>
        <a href=""></a>
    </div>

    <span>kampány blogbejegyzései</span>
    <div>
        @if($posts)
            @foreach($posts as $post)
                <a href="/post/{{$post->id}}">{{$post->title}}</a>
            @endforeach
        @endif
    </div>

    <span>kampány kuponjai</span>
    <div>
        @if($coupons)
            @foreach($coupons as $coupon)
                <p>{{$coupon->name}}</p>
                <p>{{$coupon->percentage}} %</p>
                <button type="submit">Aktiválás</button>
            @endforeach
        @endif
    </div>

    <span>kampány státusza</span>
    @if($campaign->status)
        <p>jóváhagyott</p>
    @else
        <p>jóváhagyásra vár</p>
    @endif

    <form action="">
        <div>
            <select name="status">
                <option value="approved">elfogadott</option>
                <option value="not accepted">nem elfogadott</option>
            </select>
            <button type="submit">módosít</button>
        </div>
    </form>

    <form action="">
        <button type="submit">Start</button>
    </form>

    <form action="">
        <button type="submit">Stop</button>
    </form>
@endsection
