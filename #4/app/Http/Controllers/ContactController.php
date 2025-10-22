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
}
