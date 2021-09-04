<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    // clients start


    public function clients()
    {
        $clients = User::where('type', 'client')->get();
        return view('clients.clients')->with('clients', $clients);
    }
    public function delete_client($id)
    {
        $client = User::find($id);
        $client->delete();
        return redirect(route('clients'))->with('message', 'Supprimé avec succès');
    }
    public function add_client()
    {
        return view('clients.add_client');
    }
    public function save_client(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
            'email' => 'required|unique:users|max:200'
        ]);
        $client = new User();
        $client->name = $request->input('name');
        $client->email = $request->input('email');
        $client->password = Hash::make($request->input('password'));
        $client->type = 'client';
        $client->save();
        return redirect(route('clients'))->with('message', 'Enregistrement a été effectué avec succès.');
    }
    public function edit_client($id)
    {
        $client = User::find($id);
        return view('clients.edit_client')->with(['client' => $client]);
    }
    public function update_client(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$id
        ]);
        $client = User::find($id);
        $client->name = $request->input('name');
        $client->email = $request->input('email');
        if($request->input('password') != null && $request->input('password') != '')$client->password = Hash::make($request->input('password'));
        $client->save();
        return redirect(route('clients'))->with('message', 'Enregistrement a été effectué avec succès.');
    }
}
