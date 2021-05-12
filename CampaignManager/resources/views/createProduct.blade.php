@extends('layout.index')

@section('center')

    <div id="productContainer">
        <form action="/createProduct" method="post" enctype="multipart/form-data" id="productForm">
            {{ csrf_field() }}
            <label for="picture">Csatolj képet a termékhez</label>
            <input type="file" name="picture">
            <label for="name">Termék neve</label>
            <input type="text" name="name" required>
            <label for="price">Termék ára</label>
            <input type="number" name="price" required>
            <label for="description">Termék leírás</label>
            <textarea name="description" required></textarea>
            <button id="productButton" type="submit">Létrehoz</button>
        </form>
    </div>
@endsection
