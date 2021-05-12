@extends('layout.index')

@section('center')
    <div class="productContainer">
        <div class="title">Kampány</div>
        <div class="error">
            <span>
                    <?php
                if(isset($_GET['msg']))
                    echo $_GET['msg'];
                ?>
            </span>
        </div>

        <div>
            <form action="/createCampaign" method="post" class="productForm">
                {{ csrf_field() }}
                <label for="name">kampány neve</label>
                <input type="text" name="name" placeholder="név" required>
                <label for="firstDay">Kampány kezdési időpontja</label>
                <input type="date" name="first_day" required>

                <label for="lastDay">Kampány végének időpontja</label>
                <input type="date" name="last_day" required>

                <label for="status">Kampáy státusza</label>
                <select name="status" required class="select">
                    <option value="accepted">elfogadott</option>
                    <option value="not accepted">nem elfogadott</option>
                </select>

                <button class="productButton" type="submit">Létrehoz</button>
            </form>
        </div>
    </div>
@endsection
