@extends('layout.index')

@section('center')

    <div>
        <form action="" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <label for="title">Cím</label>
            <input type="text" name="name" required>
            <label for="post">Bejegyzés</label>
            <textarea name="post" required></textarea>
            <button type="submit">Létrehoz</button>
        </form>
    </div>
@endsection
