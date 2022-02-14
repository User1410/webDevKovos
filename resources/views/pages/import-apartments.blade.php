@extends('main')
@section('content')
<div class="col-10 col-md-6 px-5">
    <form action="/parse-apartments" method="post" enctype="multipart/form-data" class="mt-4">
        @csrf
        <label for="apartmentsCsv">Importuoti apartamentus</label>
        <input type="file" name="apartmentsCsv" class="form-control">
        <button type="submit" class="btn btn-success my-3">Importuoti</button>
    </form>
</div>
@endsection