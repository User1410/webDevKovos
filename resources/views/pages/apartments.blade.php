@extends('main')
@section('content')
<div class="px-2 py-2 mt-3">

    <!--MODAL-->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Patvirtinkite veiksma</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Ar tikrai norite istrinti irasa?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Uzdaryti</button>
              <a id="modal-link" class="btn btn-primary">Trinti</a>
            </div>
          </div>
        </div>
      </div>

    

    <h3 class="text-center">Vadybininko zona</h3>
    <div class="my-3">
        <a href="/add-apartments" class="btn btn-success btn-lg my-1">Prideti butus</a>
        <a href="/import-apartments" class="btn btn-success btn-lg my-1">Importuoti butus (.csv)</a>
    </div>
    <div class="filter">
        <h4 class="py-2">Filtras</h4>
        <form class="row gx-2">
            <div class="col-6 col-md">
                <label for="reserved">Rezervuoti</label>
                <select name="reserved" class="form-select">
                    <option value="" selected>--Pasirinkite--</option>
                    <option value="1">Reservuoti</option>
                    <option value="0">Laisvi</option>
                </select>
            </div>
            <div class="col-6 col-md">
                <label for="price">Kaina</label>
                <select name="price" class="form-select">
                    <option value="" selected>--Pasirinkite--</option>
                    <option value="desc">Brangiausi virsuje</option>
                    <option value="asc">Pigiausi virsuje</option>
                </select>
            </div>
            <div class="col-6 col-md">
                <label for="location">Adresas</label>
                <select name="location" class="form-select">
                    <option value="" selected>--Pasirinkite--</option>
                    <option value="asc">Nuo A iki Z</option>
                    <option value="desc">Nuo Z iki A</option>
                </select>
            </div>
            <div class="col-6 col-md">
                <label for="creation">Sukurimo laikas</label>
                <select name="creation" class="form-select">
                    <option value="" selected>--Pasirinkite--</option>
                    <option value="desc">Naujausi virsuje</option>
                    <option value="asc">Seniausi virusuje</option>
                </select>
            </div>
            <div class="col-auto mt-4">
                <button type="submit" class="btn btn-primary">Filtruoti</button>
            </div>
        </form>
    </div>
    <div class="mt-4">
        @include('_partials.success-alert')
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>Location</th>
                    <th>floors</th>
                    <th>bedrooms</th>
                    <th>bathrooms</th>
                    <th>living spaces</th>
                    <th>car spaces</th>
                    <th>area from</th>
                    <th>area to</th>
                    <th>price from</th>
                    <th>price to</th>
                    <th>status</th>
                    <th>delete</th>
                </tr>
                @foreach ($apartments as $apartment)
                    <tr>
                        <td>{{$apartment['location']}}</td>
                        <td>{{$apartment['floor']}}</td>
                        <td>{{$apartment['bedrooms']}}</td>
                        <td>{{$apartment['bathrooms']}}</td>
                        <td>{{$apartment['living_spaces']}}</td>
                        <td>{{$apartment['car_spaces']}}</td>
                        <td>{{$apartment['area']}}</td>
                        <td>{{$apartment['area']}}</td>
                        <td>{{$apartment['price']}}</td>
                        <td>{{$apartment['price']}}</td>
                        @if($apartment['status'] == 'reserved')
                            <td><a href="/cancel-reservation/{{$apartment->id}}" class="btn btn-danger">Rezervuotas</a></td>
                        @elseif ($apartment['status'] == 'available')
                            <td><a href="" class="btn btn-success">Laisvas</a></td>
                        @endif
                        <td><a class="btn btn-danger modal-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="{{$apartment['id']}}">Delete</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
{{$apartments->links()}}
@endsection
@section('javascript')
<script src="{{asset('js/apartments.js')}}"></script>
@endsection