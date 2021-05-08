@extends('layout.index')

@section('center')
    <form action="" method="post">
        {{ csrf_field() }}
        <label for="name">kampány neve</label>
        <input type="text" name="name"required>
        <label for="firstDay">Kampány kezdési időpontja</label>
        <input type="date" name="first_day" required>

        <label for="lastDay">Kampány végének időpontja</label>
        <input type="date" name="last_day" required>

        <label for="status">Kampáy státusza</label>
        <select name="status" required>
            <option value="accepted">elfogadott</option>
            <option value="not accepted">nem elfogadott</option>
        </select>

        <button type="submit">Létrehoz</button>
    </form>
@endsection
