@extends('layout.index')

@section('center')

    <div>
        <form action="" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <label for="discount">Kedvezmény mértéke (%ban)</label>
            <input type="number" name="discount" required>
            <button type="submit">Létrehoz</button>
        </form>
    </div>
@endsection
