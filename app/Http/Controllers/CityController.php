<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CityController extends Controller
{

    // cities start


    public function cities()
    {
        $cities = City::all();
        return view('cities.cities')->with('cities', $cities);
    }
    public function delete_city($id)
    {
        $city = City::find($id);
        $city->delete();
        return redirect(route('cities'))->with('message', 'Supprimé avec succès');
    }
    public function add_city()
    {
        return view('cities.add_city');
    }
    public function save_city(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $city = new City();
        $city->name = $request->input('name');
        $city->lat = $request->input('lat');
        $city->lng = $request->input('lng');
        $city->save();
        return redirect(route('cities'))->with('message', 'Enregistrement a été effectué avec succès.');
    }
    public function edit_city($id)
    {
        $city = City::find($id);
        return view('cities.edit_city')->with(['city' => $city]);
    }
    public function update_city(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $city = City::find($id);
        $city->name = $request->input('name');
        $city->lat = $request->input('lat');
        $city->lng = $request->input('lng');
        $city->save();
        return redirect(route('cities'))->with('message', 'Enregistrement a été effectué avec succès.');
    }
}
