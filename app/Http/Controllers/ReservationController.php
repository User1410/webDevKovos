<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
   public function showForm(Apartment $apartment) {
       $apartmentId = $apartment->id;
       return view('pages.order', compact('apartmentId'));
   }

   public function reserveApartment(Apartment $apartment, Request $request) {
        $validated = $request->validate([
            "first_name" => 'string|between:3,60',
            "last_name" => 'string|between:3,60',
            'email' => 'email:rfc,dns',
            'phone' => 'string|regex:/(^\+\d{3,3} *\d{3,3} *\d{5,5}$)/',
            'message' => 'string|nullable|max:5000'
        ]);    

        $inputArray = $request->input();
        $inputArray['reserved_at'] = Carbon::now();
        Reservation::create($inputArray);

        
        Apartment::where('id', $apartment->id)->update(['status' => 'reserved']);

        return redirect('reservations')->with('success', 'Sekimgai uzsakytas butas');
   }
}
