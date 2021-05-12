@extends('layout.index')

@section('center')

    <div class="productContainer">
        <div class="title">Termék</div>
        <form action="/createProduct" method="post" enctype="multipart/form-data" class="productForm">
            {{ csrf_field() }}
            <label for="picture">Csatolj képet a termékhez</label>
            <input type="file" name="picture">
            <label for="name">Termék neve</label>
            <input type="text" name="name" placeholder="név" required>
            <label for="price">Termék ára</label>
            <input type="number" name="price" placeholder="pl: 3000" required>
            <label for="description">Termék leírás</label>
            <textarea name="description" required></textarea>
            <button class="productButton" type="submit">Létrehoz</button>
        </form>
    </div>
@endsection
