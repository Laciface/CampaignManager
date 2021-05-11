@extends('layout.index')

@section('center')

    <h2>{{ $campaign->name }}</h2>

    <span>
        <?php
            if(isset($_GET['msg']))
            echo $_GET['msg'];
        ?>
    </span>
    <span>kampány termékei</span>
    <div>
        @if($products)
            @foreach($products as $productList)
                {{--<img src="{{ Storage::url('images/' . $product['image'])}}" alt="" width="100" height="100">--}}
                @foreach($productList as $product)
                    <p>{{ $product['name'] }}</p>
                @endforeach
            @endforeach
        @endif

        <form action="/addProduct/{{$campaign->id}}" method="post">
            {{ csrf_field() }}
            <select name="productId">
                @foreach($availableProducts as $newProduct)
                    <option value="{{$newProduct['id']}}">{{$newProduct['name']}}</option>
                @endforeach
            </select>
            <button type="submit">Hozzáad</button>
        </form>
    </div>

    <span>kampány blogbejegyzései</span>
    <div>
        @if($posts)
            @foreach($posts as $postList)
                @foreach($postList as $post)
                    <p>{{ $post['title'] }}</p>
                @endforeach
            @endforeach
        @endif

        <form action="/addPost/{{$campaign->id}}" method="post">
            {{ csrf_field() }}
            <select name="postId">
                @foreach($availablePosts as $newPost)
                    <option value="{{$newPost['id']}}">{{$newPost['title']}}</option>
                @endforeach
            </select>
            <button type="submit">Hozzáad</button>
        </form>
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
