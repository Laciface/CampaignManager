@extends('layout.index')

@section('center')

    <div class="productContainer">
        <div class="title">Kupon</div>
        <form action="/createCoupon" method="post" enctype="multipart/form-data" class="productForm">
            {{ csrf_field() }}
            <label for="name">Kupon neve</label>
            <input type="text" name="name" placeholder="név" required>
            <label for="discount">Kedvezmény mértéke</label>
            <select name="discount" required class="select">
                <option value="0.05">5%</option>
                <option value="0.1">10%</option>
                <option value="0.15">15%</option>
                <option value="0.2">20%</option>
                <option value="0.25">25%</option>
                <option value="0.3">30%</option>
            </select>
            <button class="productButton" type="submit">Létrehoz</button>
        </form>
    </div>
@endsection
