<?php

namespace App\Http\Controllers;

use App\Mail\ReservationMail;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PDF;

class ReservationController extends Controller
{
    public function saveReservation(Request $request) {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required'
        ]);
        if(!$request->input('seats') || count($request->input('seats')) < 1) {
            return response(['message' => 'no seats selected'], 400);
        }
        $reservations = [];
        foreach($request->input('seats') as $seat) {
            $reservation = new Reservation();
            $reservation->name = $request->input('name');
            $reservation->email = $request->input('email');
            $reservation->phone = $request->input('phone');
            $reservation->number = $request->input('number');
            $reservation->trip_id = $request->input('id');
            $reservation->start_point_id = $request->input('start_point_id');
            $reservation->end_point_id = $request->input('end_point_id');
            $reservation->cart = $request->input('cart');
            $reservation->seat = $seat['seat'];
            do {
                $number = $this->getToken(8);
                $reservations_sku = Reservation::where('number', $number)->get();
            }
            while(count($reservations_sku) > 0);
            $reservation->number = $number;
            $reservation->save();
            $reservations[] = $reservation;
        }
        try {
            Mail::to($request->input('email'))->send(new ReservationMail($reservations));
        } catch(\Exception $e) {
            return response($e, 400);
        }
        return response($reservations, 200);
    }
    public function ticket($id) {
        $reservation = Reservation::find($id);
        if( !$reservation ) return response(['message' => 'Reservation not found'], 404);
        $customPaper = array(0,0,210,311.81);
        $pdf = PDF::loadView('reservation', [ 'reservation' => $reservation])->setPaper($customPaper, 'landscape');
        $pdf->setPaper($customPaper, 'landscape');
        $pdf->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        return $pdf->download('ticket.pdf');
    }
    function getToken($length)
    {
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet); // edited
        for ($i=0; $i < $length; $i++) {
            $token .= $codeAlphabet[$this->crypto_rand_secure(0, $max-1)];
        }
        return $token;
    }
    function crypto_rand_secure($min, $max)
    {
        $range = $max - $min;
        if ($range < 1) return $min; // not so random...
        $log = ceil(log($range, 2));
        $bytes = (int) ($log / 8) + 1; // length in bytes
        $bits = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd > $range);
        return $min + $rnd;
    }
    public function reservations() {
        $reservations = Reservation::all();
        return view('reservations.reservations')->with(['reservations' => $reservations]);
    }
    public function reservation($id) {
        $reservation = Reservation::find($id);
        return view('reservations.reservation')->with(['reservation' => $reservation]);
    }
}
