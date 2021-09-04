<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DriverController extends Controller
{

    // drivers start


    public function drivers()
    {
        $drivers = Driver::where('user_id', Auth::user()->id)->get();
        return view('drivers.drivers')->with('drivers', $drivers);
    }
    public function delete_driver($id)
    {
        $driver = Driver::find($id);
        $driver->delete();
        return redirect(route('drivers'))->with('message', 'Supprimé avec succès');
    }
    public function add_driver()
    {
        return view('drivers.add_driver');
    }
    public function save_driver(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);
        $driver = new Driver();
        $driver->name = $request->input('name');
        $driver->email = $request->input('email');
        $driver->phone = $request->input('phone');
        $driver->rib = $request->input('rib');
        $driver->cin = $request->input('cin');
        $driver->user_id = Auth::user()->id;
        if($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename =pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . time().'.'.$extension;
            $file->move('uploads/', $filename);
            $driver->image = asset('uploads/' . $filename);
        }
        $driver->save();
        return redirect(route('drivers'))->with('message', 'Enregistrement a été effectué avec succès.');
    }
    public function edit_driver($id)
    {
        $driver = Driver::find($id);
        return view('drivers.edit_driver')->with(['driver' => $driver]);
    }
    public function update_driver(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);
        $driver = Driver::find($id);
        $driver->name = $request->input('name');
        $driver->email = $request->input('email');
        $driver->phone = $request->input('phone');
        $driver->rib = $request->input('rib');
        $driver->cin = $request->input('cin');
        if($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename =pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . time().'.'.$extension;
            $file->move('uploads/', $filename);
            $driver->image = asset('uploads/' . $filename);
        }
        $driver->save();
        return redirect(route('drivers'))->with('message', 'Enregistrement a été effectué avec succès.');
    }
}
