<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VehicleController extends Controller
{
    // vehicles start


    public function vehicles()
    {
        $vehicles = Vehicle::where('user_id', Auth::user()->id)->get();
        return view('vehicles.vehicles')->with('vehicles', $vehicles);
    }
    public function delete_vehicle($id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->delete();
        return redirect(route('vehicles'))->with('message', 'Supprimé avec succès');
    }
    public function add_vehicle()
    {
        return view('vehicles.add_vehicle');
    }
    public function save_vehicle(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $equipements = '';
        if($request->input('equipements') != null) {
            $equipements = implode(',', $request->input('equipements'));
        }
        $vehicle = new Vehicle();
        $vehicle->name = $request->input('name');
        $vehicle->type = $request->input('type');
        $vehicle->number = $request->input('number');
        $vehicle->seats = $request->input('seats');
        $vehicle->carts = $request->input('carts');
        $vehicle->equipements = $equipements;
        $vehicle->user_id = Auth::user()->id;
        if($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename =pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . time().'.'.$extension;
            $file->move('uploads/', $filename);
            $vehicle->image = asset('uploads/' . $filename);
        }
        $vehicle->save();
        return redirect(route('vehicles'))->with('message', 'Enregistrement a été effectué avec succès.');
    }
    public function edit_vehicle($id)
    {
        $vehicle = Vehicle::find($id);
        $equipements = explode(',', $vehicle->equipements);
        return view('vehicles.edit_vehicle')->with(['vehicle' => $vehicle, 'equipements' => $equipements]);
    }
    public function update_vehicle(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $equipements = '';
        if($request->input('equipements') != null) {
            $equipements = implode(',', $request->input('equipements'));
        }
        $vehicle = Vehicle::find($id);
        $vehicle->name = $request->input('name');
        $vehicle->type = $request->input('type');
        $vehicle->number = $request->input('number');
        $vehicle->seats = $request->input('seats');
        $vehicle->carts = $request->input('carts');
        $vehicle->equipements = $equipements;
        if($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename =pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . time().'.'.$extension;
            $file->move('uploads/', $filename);
            $vehicle->image = asset('uploads/' . $filename);
        }
        $vehicle->save();
        return redirect(route('vehicles'))->with('message', 'Enregistrement a été effectué avec succès.');
    }
}
