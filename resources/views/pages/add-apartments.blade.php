@extends('main')
@section('content')
<div class="col-11 col-sm-10 col-lg-6 m-auto">
    @include('_partials.errors')
    <form action="/store-apartments" method="post">
        @csrf
        <label for="name">Pavadinimas</label>
        <input type="text" name="name" class="form-control">
        <label for="location">Vieta</label>
        <input type="text" name="location" class="form-control">
        <label for="floor">Aukstas</label>
        <input type="text" name="floor" class="form-control">
        <label for="bedrooms">Miegamieji kambariai</label>
        <input type="text" name="bedrooms" class="form-control">
        <label for="car_spaces">Stovejimo vietos</label>
        <input type="text" name="car_spaces" class="form-control">
        <label for="living_spaces">Kambariai</label>
        <input type="text" name="living_spaces" class="form-control">
        <label for="bathrooms">Vonios kambariai</label>
        <input type="text" name="bathrooms" class="form-control">
        <label for="area">Plotas</label>
        <input type="text" name="area" class="form-control">
        <label for="price">Kaina</label>
        <input type="text" name="price" class="form-control">
        <label for="date_sell_from">Nuo kada parduodate</label>
        <input type="date" name="date_sell_from" class="form-control">
        <label for="date_sell_to">Iki kada parduodate</label>
        <input type="date" name="date_sell_to" class="form-control">
        <button class="btn btn-primary mt-3">Prideti</button>
    </form>
</div>
@endsection