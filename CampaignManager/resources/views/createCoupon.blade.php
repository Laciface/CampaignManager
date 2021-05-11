@extends('layout.index')

@section('center')

    <div>
        <form action="/createCoupon" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <label for="name">Kupon neve</label>
            <input type="text" name="name" required>
            <label for="discount">Kedvezmény mértéke</label>
            <select name="discount" required>
                <option value="0.05">5%</option>
                <option value="0.1">10%</option>
                <option value="0.15">15%</option>
                <option value="0.2">20%</option>
                <option value="0.25">25%</option>
                <option value="0.3">30%</option>
            </select>
            <button type="submit">Létrehoz</button>
        </form>
    </div>
@endsection
