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
            @foreach($coupons as $couponList)
                @foreach($couponList as $coupon)
                    <form action="/activateCoupon/{{$campaign->id}}" method="post">
                        {{csrf_field()}}
                        <p>{{ $coupon['name'] }}</p>
                        <p>{{$coupon->percentage}} %</p>
                        <input type="hidden" name="coupon" value="{{$coupon->discount}}">
                        <button type="submit">Aktiválás</button>
                    </form>
                @endforeach
            @endforeach
        @endif

        <form action="/addCoupon/{{$campaign->id}}" method="post">
            {{ csrf_field() }}
            <select name="couponId">
                @foreach($availableCoupons as $newCoupon)
                    <option value="{{$newCoupon['id']}}">{{$newCoupon['name']}} ({{$newCoupon['percentage']}}%)</option>
                @endforeach
            </select>
            <button type="submit">Hozzáad</button>
        </form>
    </div>

    <span>kampány státusza</span>
    @if($campaign->approved)
        <p>jóváhagyott</p>
    @else
        <p>jóváhagyásra vár</p>
    @endif
    <div>
        <form action="/changeStatus/{{$campaign->id}}" method="post">
            {{csrf_field()}}
            <select name="status">
                <option value="1">elfogadott</option>
                <option value="0">nem elfogadott</option>
            </select>
            <button type="submit">módosít</button>
        </form>
    </div>

    <form action="/activate/{{$campaign->id}}" method="post">
        {{csrf_field()}}
        <button type="submit">Start</button>
    </form>

    <form action="/stop/{{$campaign->id}}" method="post">
        {{csrf_field()}}
        <button type="submit">Stop</button>
    </form>
@endsection
