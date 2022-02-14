<?php

namespace App\Http\Controllers;

use App\Imports\ApartmentsImport;
use App\Models\Apartment;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ApartmentController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if($request->input()){
            $apartments = $this->apartmentFilter($request);   
        } else {
            $apartments = Apartment::paginate(15);
        }

        return view('pages.apartments', compact('apartments'));
    }

    public function showImport() {
        return view('pages.import-apartments');
    }
  
    public function showInputs() {
        return view('pages.add-apartments');
    }

    private function apartmentFilter(Request $request) {
        return $apartments = Apartment::when($request->price, function($query, $price){
                return $query->orderBy('price', $price);
            })->when($request->location, function($query, $location) {
                return $query->orderBy('location', $location);
            })->when($request->creation, function($query, $creation){
                return $query->orderBy('created_at', $creation);
            })->when($request->reserved, function($query, $reserved){
                if($reserved) {
                    return $query->where('status', 'reserved');
                } elseif(intval($reserved) == 0) {
                    return $query->where('status', 'available');
                }
            })->paginate(15);
        }

    public function importApartments(Request $request) {
        $apartmentsCsv = $request->file('apartmentsCsv');
        $apartments = Excel::import(new ApartmentsImport, $apartmentsCsv);

        return redirect('/apartments')->with('success', 'butai importuoti sekmingai');
    }

    public function storeApartments(Request $request) {
        $validated = $request->validate([
            'name' => 'string|between:3,255',
            'location' => 'string|between:3,255',
            'floor' => 'integer|max:200',
            'bedrooms' => 'integer|max:40',
            'car_spaces' => 'integer|max:100',
            'living_spaces' => 'integer|nullable|max:100',
            'bathrooms' => 'integer|nullable|max:50',
            'area' => 'integer'
        ]);

        Apartment::create($request->input());

        return redirect('/apartments')->with('success', 'butas ivestas sekmingai');
    }

    public function deleteApartment(Apartment $apartment) {
        $apartment->delete();

        return redirect('/apartments')->with('success', 'butas istrintas sekmingai');
    }

    public function showReservations(Request $request) {
        if($request->input()) {
            $apartments = $this->apartmentFilter($request);
        } else {
            $apartments = Apartment::where('status', 'available')->paginate(15);
        }
        return view('pages.reservations', compact('apartments'));
    }

    public function cancelReservation(Apartment $apartment) {
        Apartment::where('id',$apartment->id)->update(['status' => 'available']);

        return redirect('/apartments')->with('success', "rezervacija atsaukta sekmingai");
    }
}
