<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submitContact(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]);
        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->message = $request->input('message');
        $contact->save();
        return response(['message' => 'Saved successfully'], 200);
    }

    public function contacts() {
        $contacts = Contact::all();
        return view('contact.list')->with(['contacts' => $contacts]);
    }

    public function contact($id) {
        $contact = Contact::find($id);
        return view('contact.contact')->with(['contact' => $contact]);
    }
}
