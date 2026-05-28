<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Seat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ReservationController extends Controller
{

    public function getMyReservation()
    {
        $userReservation = Reservation::all();
        return view('myReservation',['my_reservation'=>$userReservation]);
    }

    public function checkReservation(Request $request){
        $request->validate([
            'ID_Reservation' => 'required'
        ]);

        $reservation = Reservation::with('seat')->where('ID_Reservasi', $request->ID_Reservation)->first();

        if(!$reservation){
                return response()->json([
                'success' => false,
                'message' => 'ID Reservation tidak ditemukan'
            ]);
        }

        return response()->json([
            'success' => true,

            'data' => [
                'ID_Reservasi' => $reservation->ID_Reservasi,
                'customer_name' => $reservation->customer_name,
                'customer_hp' => $reservation->phone_number,
                'customer_date' => Carbon::parse($reservation->reservation_date)->locale('id')->translatedFormat('l, d F Y'),
                'customer_time' => $reservation->reservation_time,
                'customer_guests' => $reservation->total_guest,
                'customer_note' => $reservation->note,
                'status_reservation' => $reservation->status,
                'customer_status' => $reservation->status,
                'seat_code' => $reservation->seat->seat_code,
                'seat_capacity' => $reservation->seat->capacity,
                'seat_size' => $reservation->seat->size_table,
                'seat_location' => $reservation->seat->location,
                'status_seats' => $reservation->seat->status,
            ]
        ]);
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

        // ambil semua session
        $reservation = session('reservation');

        // keamanan
        if (!$reservation){
            return redirect()->route('reservation_step1');
        }

        // ambil detail seat dari db
        $seat = Seat::find($reservation['seat_id']);

        return view('reservations.confirm', [
        'current_step' => 4,
        'reservation' => $reservation,
        'seat' => $seat
        ]);
    }

    public function step4_store(){
        // ambil session
        $reservation = session('reservation');

        if(!$reservation){
            return redirect()->route('reservation_step1');
        }

        // generate ID Reservasi
        $nameInitial = strtoupper(substr($reservation['customer_name'],0,2));

        $phoneLast = substr($reservation['customer_hp'],-4);

        $random = strtoupper(Str::random(5));

        $IDReservasi = 'RV' . $nameInitial . $phoneLast . $random;

        // simpan reservation
        $newReservation = Reservation::create([
            'seat_id' => $reservation['seat_id'],
            'ID_Reservasi' => $IDReservasi,
            'customer_name' => $reservation['customer_name'],
            'phone_number' => $reservation['customer_hp'],
            'reservation_date' => $reservation['customer_date'],
            'reservation_time' => $reservation['customer_time'],
            'total_guest' => $reservation['customer_guests'],
            'note' => $reservation['customer_note'] ?? null,
            'status' => 'pending'
        ]);

        // update seat jadi booked

        Seat::where('id', $reservation['seat_id'])->update([
            'status' => 'booked'
        ]);

        session()->forget('reservation');

        return redirect('/')->with('success', 'Reservation Berhasil Dibuat! Kode Reservasi Anda: '
        . $newReservation->ID_Reservasi);
    }

    public function cancelReservation(Request $request){
        $reservation = Reservation::with('seat')->where('ID_Reservasi', $request->ID_Reservasi)->first();

        if(!$reservation){
            return response()->json([
                'success' => false,
                'message' => 'Reservation tidak ditemukan'
            ]);
        }

        // update reservation
        $reservation->status = 'cancelled';
        $reservation->save();

        // seat kembali available
        $reservation->seat->status = 'available';
        $reservation->seat->save();

        return response()->json([
            'success' => true,
            'message' => 'Reservation berhasil dibatalkan'
        ]);

    }
}
