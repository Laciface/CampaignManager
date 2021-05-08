@extends('layout.index')

@section('center')

    <div>
        <form action="" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <label for="picture">Csatolj képet a termékhez</label>
            <input type="file">
            <label for="name">Termék neve</label>
            <input type="text" name="name" required>
            <label for="description">Termék leírás</label>
            <input type="text" name="description" required>
            <button type="submit">Létrehoz</button>
        </form>
    </div>
@endsection
