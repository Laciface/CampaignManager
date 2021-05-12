@extends('layout.index')

@section('center')

<h2 class="mainTitle">{{ $campaign->name }}</h2>
<div class="error">
    <span>
        <?php
        if(isset($_GET['msg']))
            echo $_GET['msg'];
        ?>
    </span>
</div>
<div id="cardContainer">
    <div class="elementCard">
        <div class="main">
            <div class="title">Kampány termékei</div>
            <div class="productList">
                @if($products)
                    @foreach($products as $productList)
                        @foreach($productList as $product)
                            <div class="column">
                                <img class="image" src="{{ Storage::url('images/' . $product['picture'])}}" alt="" width="100" height="100">
                                <a href="/readProduct/{{$product->id}}">{{ $product['name'] }}</a>
                                @if($product['sale'] !== 0)
                                    <p>{{ $product['sale'] }} Ft</p>
                                @else
                                    <p>{{ $product['price'] }} Ft</p>
                                @endif
                            </div>
                        @endforeach
                    @endforeach
                @endif
            </div>
        </div>
        <div class="campaignForm">
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
    </div>
    <div class="elementCard">
        <div class="title">Kampány blogbejegyzései</div>
        <div class="productList">
            @if($posts)
                @foreach($posts as $postList)
                    @foreach($postList as $post)
                        <div>
                            <a href="/readPost/{{$post->id}}">{{ $post['title'] }}</a>
                        </div>
                    @endforeach
                @endforeach
            @endif
        </div>
            <form action="/addPost/{{$campaign->id}}" method="post" class="campaignForm">
                {{ csrf_field() }}
                <select name="postId">
                    @foreach($availablePosts as $newPost)
                        <option value="{{$newPost['id']}}">{{$newPost['title']}}</option>
                    @endforeach
                </select>
                <button type="submit">Hozzáad</button>
            </form>
    </div>
    <div class="elementCard">
        <div class="title">Kampány kuponjai</div>
        <div>
            @if($coupons)
                @foreach($coupons as $couponList)
                    @foreach($couponList as $coupon)
                        <form action="/activateCoupon/{{$campaign->id}}" method="post" >
                            {{csrf_field()}}
                            <p>{{ $coupon['name'] }}</p>
                            <p>{{$coupon->percentage}} %</p>
                            <input type="hidden" name="coupon" value="{{$coupon->discount}}">
                            <button type="submit">Aktiválás</button>
                        </form>
                    @endforeach
                @endforeach
            @endif

            <form action="/addCoupon/{{$campaign->id}}" method="post" class="campaignForm">
                {{ csrf_field() }}
                <select name="couponId">
                    @foreach($availableCoupons as $newCoupon)
                        <option value="{{$newCoupon['id']}}">{{$newCoupon['name']}} ({{$newCoupon['percentage']}}%)</option>
                    @endforeach
                </select>
                <button type="submit">Hozzáad</button>
            </form>
        </div>
    </div>
<div class="elementCard">
    <div class="title">Kampány státusza</div>
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
</div>
</div>
<div class="buttonContainer">
    <form action="/activate/{{$campaign->id}}" method="post">
        {{csrf_field()}}
        <button class="buttons" type="submit">Start</button>
    </form>

    <form action="/stop/{{$campaign->id}}" method="post">
        {{csrf_field()}}
        <button class="buttons" type="submit">Stop</button>
    </form>
</div>
@endsection
