<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function step1() {
        return view('reservations.reservation', ['current_step' => 1]);
    }

    public function step1_store(Request $request){
        session([
            'reservation' => [
                'customer_name' => $request->name,
                'phone_number' => $request->hp,
                'reservation_date' => $request->date,
                'reservation_time' => $request->time,
                'total_guest' => $request->guests,
            ]
        ]);

        return redirect()->route('reservation_step2');
    }

    public function step2(){
        return view('reservations.seat', ['current_step' => 2]);
    }

    public function step2_store(Request $request){
        
    }
}
