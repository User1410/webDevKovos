@extends("main")
@section('content')
<div>
    <h3 class="py-3 px-3">Butu skelbimai</h3>
    <div class="filter">
        <h4 class="py-2">Filtras</h4>
        <form class="row gx-2">
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
    @include("_partials.success-alert")
    <div class="row g-3 mt-4">
        @foreach ($apartments as $apartment)
            <div class="col-xl-3">
                <div class="card">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$apartment['name']}}</h5>
                        <div>
                            <p class="m-0 fs-5"><span class="fs-4">Vieta:</span> {{$apartment['location']}}</p>
                            <p class="m-0 fs-5"><span class="fs-4">Aukstas:</span> {{$apartment['floor']}}</p>
                            <p class="m-0 fs-5"><span class="fs-4">Miegamieji:</span> {{$apartment['bedrooms']}}</p>
                            <p class="m-0 fs-5"><span class="fs-4">Vonios kambariai:</span> {{$apartment['bathrooms']}}</p>
                            <p class="m-0 fs-5"><span class="fs-4">Kambariai:</span> {{$apartment['living_spaces']}}</p>
                            <p class="m-0 fs-5"><span class="fs-4">Stovejimo vietos:</span> {{$apartment['car_spaces']}}</p>
                            <p class="m-0 fs-5"><span class="fs-4">Plotas:</span> {{$apartment['area']}} m<sup>2</sup></p>
                        </div>
                        <p class="m-0 w-100 text-end fs-3">{{$apartment['price']}} €</p>
                        <a href="/order/{{$apartment->id}}" class="btn btn-primary">Uzsisakyti</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="my-5"> 
        {{$apartments->links()}}
    </div>
</div>
@endsection