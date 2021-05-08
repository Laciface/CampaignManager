@extends('layout.index')

@section('center')
    <form action="" method="post">
        {{ csrf_field() }}
        <label for="firstDay">Kampány kezdési időpontja</label>
        <input type="date" required>

        <label for="lastDay">Kampány végének időpontja</label>
        <input type="date" required>

        <label for="status">Kampáy státusza</label>
        <select name="status" required>
            <option value="accepted">elfogadott</option>
            <option value="not accepted">nem elfogadott</option>
        </select>

        <button type="submit">Létrehoz</button>
    </form>
@endsection
