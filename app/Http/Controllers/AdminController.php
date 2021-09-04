<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Driver;
use App\Models\Post;
use App\Models\Reservation;
use App\Models\Trip;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index() {
        if(Auth::user()->type == 'client') {
            $drivers = Driver::where('user_id', Auth::user()->id)->get();
            $vehicles = Vehicle::where('user_id', Auth::user()->id)->get();
            $trips = Trip::where('user_id', Auth::user()->id)->get();
            $reservations = Reservation::whereHas('trip', function ($q) {
                $q->where('user_id', Auth::user()->id);
            })->get();
            $reservationsMonthCount = Reservation::select(DB::raw('count(id) as numberReservations'), DB::raw('MONTH(created_at) as dateMonth'))
            ->whereHas('trip', function ($q) {
                $q->where('user_id', Auth::user()->id);
            })->groupBy('dateMonth')->orderBy('dateMonth', 'asc')->limit(12)->get();
            $reservationsDayCount = Reservation::select(DB::raw('count(id) as numberReservations'), DB::raw('Date(created_at) as dateDay'))
            ->whereHas('trip', function ($q) {
                $q->where('user_id', Auth::user()->id);
            })->groupBy('dateDay')->orderBy('dateDay', 'asc')->limit(12)->get();
            $commentsMonthCount = Comment::select(DB::raw('count(id) as numberComments'), DB::raw('MONTH(created_at) as dateMonth'))
            ->whereHas('post', function ($q) {
                $q->where('user_id', Auth::user()->id);
            })->groupBy('dateMonth')->orderBy('dateMonth', 'asc')->limit(12)->get();
            $commentsDayCount = Comment::select(DB::raw('count(id) as numberComments'), DB::raw('Date(created_at) as dateDay'))
            ->whereHas('post', function ($q) {
                $q->where('user_id', Auth::user()->id);
            })->groupBy('dateDay')->orderBy('dateDay', 'asc')->limit(12)->get();
            return view('dashboard')->with(['drivers' => $drivers,'vehicles' => $vehicles,'trips' => $trips,'reservations' => $reservations,'reservationsMonthCount' => $reservationsMonthCount,'reservationsDayCount' => $reservationsDayCount,'commentsMonthCount' => $commentsMonthCount,'commentsDayCount' => $commentsDayCount]);
        } else if(Auth::user()->type == 'admin') {
            
            $posts = Post::all();
            $clients = User::where('type', 'client')->get();
            $trips = Trip::all();
            $reservations = Reservation::all();
            $reservationsMonthCount = Reservation::select(DB::raw('count(id) as numberReservations'), DB::raw('MONTH(created_at) as dateMonth'))
            ->groupBy('dateMonth')->orderBy('dateMonth', 'asc')->limit(12)->get();
            $reservationsDayCount = Reservation::select(DB::raw('count(id) as numberReservations'), DB::raw('Date(created_at) as dateDay'))
            ->groupBy('dateDay')->orderBy('dateDay', 'asc')->limit(12)->get();
            $commentsMonthCount = Comment::select(DB::raw('count(id) as numberComments'), DB::raw('MONTH(created_at) as dateMonth'))
            ->groupBy('dateMonth')->orderBy('dateMonth', 'asc')->limit(12)->get();
            $commentsDayCount = Comment::select(DB::raw('count(id) as numberComments'), DB::raw('Date(created_at) as dateDay'))
            ->groupBy('dateDay')->orderBy('dateDay', 'asc')->limit(12)->get();
            return view('dashboard')->with(['posts' => $posts,'clients' => $clients,'trips' => $trips,'reservations' => $reservations,'reservationsMonthCount' => $reservationsMonthCount,'reservationsDayCount' => $reservationsDayCount,'commentsMonthCount' => $commentsMonthCount,'commentsDayCount' => $commentsDayCount]);
        }
        return view('dashboard');
    }
    public function profile() {
        return view('profile');
    }
    public function update_profile(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.Auth::user()->id
        ]);
        $user=User::find(Auth::user()->id);
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        if($request->input('password') != '' && $request->input('password') != null) $user->password=Hash::make($request->input('password'));
        $user->save();
        return redirect(route('profile'));
    }
}
