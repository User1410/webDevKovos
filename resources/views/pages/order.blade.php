@extends('main')
@section('content')
<div class="col-lg-8 col-11 m-auto">
    @include("_partials.errors")
    <form action="/apartments/{{$apartmentId}}/reserve" method="post">
        @csrf
        <label for="first_name">Vardas</label>
        <input type="text" class="form-control" name="first_name">
        <label for="last_name">Pavarde</label>
        <input type="text" class="form-control" name="last_name">
        <label for="phone">Tel. numeris</label>
        <input type="text" class="form-control" name="phone">
        <label for="email">El. pastas</label>
        <input type="text" class="form-control" name="email">
        <label for="message">zinute</label>
        <textarea name="message" id="" cols="30" rows="10" class="form-control"></textarea>
        <button type="submit" class="btn btn-primary my-2">Uzsakyti</button>
    </form>
</div>
@endsection