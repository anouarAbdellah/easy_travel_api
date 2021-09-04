<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Driver;
use App\Models\Point;
use App\Models\Trip;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TripController extends Controller
{
    public function getTrips(Request $request) {
        $trips = Trip::with(array('reservations' => function($query) {
            $query->select('id', 'trip_id', 'seat', 'cart');
        }))
        ->where('start', ">=", Carbon::parse($request->input('checkin')))
        ->whereHas('points', function($q) use($request) {
            $q->where('time', ">", Carbon::parse($request->input('checkin')))
            ->whereHas('city', function($q2) use($request) {
                $q2->whereRaw('LOWER(`name`) = ?', [strtolower($request->input('from'))] );
            });
        })
        ->whereHas('points', function($q) use($request) {
            $q->where('time', ">", Carbon::parse($request->input('checkin')))
            ->whereHas('city', function($q2) use($request) {
                $q2->whereRaw('LOWER(`name`) = ?', [strtolower($request->input('to'))] );
            });
        })->whereHas('vehicle', function($q) use($request) {
            $q->whereRaw('LOWER(`type`) = ?', [strtolower($request->input('type'))] );
        })->get();
        return response($trips, 200);
    }
    public function trips()
    {
        $trips = Trip::where('user_id', Auth::user()->id)->get();
        return view('trips.trips')->with('trips', $trips);
    }
    public function delete_trip($id)
    {
        $trip = Trip::find($id);
        $trip->delete();
        return redirect(route('trips'))->with('message', 'Supprimé avec succès');
    }
    public function add_trip()
    {
        $cities = City::all();
        $drivers = Driver::all();
        $vehicles = Vehicle::all();
        return view('trips.add_trip')->with(['cities' => $cities,'drivers' => $drivers,'vehicles' => $vehicles]);
    }
    public function save_trip(Request $request)
    {
        $request->validate([
            'start' => 'required'
        ]);
        $trip = new Trip();
        $trip->start = $request->input('start');
        $trip->corona_mode = $request->input('corona_mode') == 'on' ? 1 : 0;
        $trip->driver_id = $request->input('driver_id');
        $trip->vehicle_id = $request->input('vehicle_id');
        $trip->user_id = Auth::user()->id;
        $trip->save();
        foreach($request->input('city_id') as $key => $city_id) {
            $point = new Point();
            $point->trip_id = $trip->id;
            $point->city_id = $request->input('city_id')[$key];
            $point->time = $request->input('time')[$key];
            $point->price = $request->input('price')[$key];
            $point->save();
        }
        return redirect(route('trips'))->with('message', 'Enregistrement a été effectué avec succès.');
    }
    public function edit_trip($id)
    {
        $trip = Trip::find($id);
        $cities = City::all();
        $drivers = Driver::all();
        $vehicles = Vehicle::all();
        return view('trips.edit_trip')->with(['trip' => $trip,'cities' => $cities,'drivers' => $drivers,'vehicles' => $vehicles]);
    }
    public function update_trip(Request $request, $id)
    {
        $request->validate([
            'start' => 'required'
        ]);
        $trip = Trip::find($id);
        $trip->start = $request->input('start');
        $trip->corona_mode = $request->input('corona_mode') == 'on' ? 1 : 0;
        $trip->driver_id = $request->input('driver_id');
        $trip->vehicle_id = $request->input('vehicle_id');
        $trip->user_id = Auth::user()->id;
        foreach($trip->points as $key => $point) {
            if(!in_array($point->id , $request->input('points'))) {
                $point->delete();
            } else {
                $point->city_id = $request->input('city_id')[$key];
                $point->time = $request->input('time')[$key];
                $point->price = $request->input('price')[$key];
                $point->save();
            }
        }
        foreach($request->input('city_id') as $key => $city_id) {
            if($request->input('points')[$key] == null) {
                $point = new Point();
                $point->trip_id = $trip->id;
                $point->city_id = $request->input('city_id')[$key];
                $point->time = $request->input('time')[$key];
                $point->price = $request->input('price')[$key];
                $point->save();
            }
        }
        $trip->save();
        return redirect(route('trips'))->with('message', 'Enregistrement a été effectué avec succès.');
    }
}
