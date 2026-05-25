<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use Illuminate\Http\Request;

class ReservationController extends Controller
{

    public function clearReservation()
    {
        session()->forget('reservation');

        return view('index');
    }

    public function step1() {
        return view('reservations.reservation', ['current_step' => 1]);
    }

    public function step1_store(Request $request){

        $request->validate([
            'customer_name' => ['required'],
            'customer_hp' => ['required'],
            'customer_date' => ['required','date'],
            'customer_time' => ['required'],
            'customer_guests' => ['required'],
            'customer_note' => ['max:255'] 
        ]);

        

        $reservation = session('reservation',[]);

        $reservation['customer_name'] = $request->customer_name;
        $reservation['customer_hp'] = $request->customer_hp;
        $reservation['customer_date'] = $request->customer_date;
        $reservation['customer_time'] = $request->customer_time;
        $reservation['customer_guests'] = $request->customer_guests;
        $reservation['customer_note'] = $request->customer_note;

        session([
            'reservation' => $reservation
        ]);

        return redirect()->route('reservation_step2');
    }

    public function step2(){
        $seats = Seat::all();

        // dd(session('reservation'));

        // ambil session lama
        $reservation = session('reservation', []);
        return view('reservations.seat', ['current_step' => 2, 'seats' => $seats, 'reservation' => $reservation]);
    }

    public function step2_store(Request $request){
        $request->validate([
        'seat_id' => 'required|exists:seats,id'
        ]);

        // ambil session lama
        $reservation = session('reservation', []);

        // tambahkan seat baru
        $reservation['seat_id'] = $request->seat_id;

        // simpan ulang
        session([
            'reservation' => $reservation
        ]);

        return redirect()->route('reservation_step3');
    }

    public function step3(){
        return view('reservations.menu', ['current_step' => 3]);
    }

    public function step3_store(){
        return redirect()->route('reservation_step4');
    }

    public function step4(){
        return view('reservations.confirm', ['current_step' => 4]);
    }
}
