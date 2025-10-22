<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactModel;

class ContactController extends Controller
{
    public function index()
	{
        return view(view:"contact");
	}
    public function getAllContacts()
    {
        $allContacts = ContactModel::all(); // Vadi sve kontakte iz BAZE "contact" table
        return view("allContacts", compact('allContacts')); // Ucitavamo allcontactblade i prosledjujemo varijablu $allContacts as $contact
    }

    public function sendContact(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'subject' => 'required|string',
            'description' => 'required|string|min:5',
        ]);

        ContactModel::create([
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'message' => $request->get('description')
        ]);

        return redirect(to:'/shop');
    }
}
