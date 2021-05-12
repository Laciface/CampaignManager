@extends('layout.index')

@section('center')

    <div class="productContainer">
        <div class="title">Blog Poszt</div>
        <form action="/createBlogPost" method="post" enctype="multipart/form-data" class="productForm">
            {{ csrf_field() }}
            <label for="title">Cím</label>
            <input type="text" name="title" placeholder="cím" required>
            <label for="post">Bejegyzés</label>
            <textarea name="post" required></textarea>
            <button class="productButton" type="submit">Létrehoz</button>
        </form>
    </div>
@endsection
