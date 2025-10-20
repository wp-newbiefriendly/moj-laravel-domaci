<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactModel;
use Illuminate\Support\Facades\Redirect;

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
    public function deleteContact($id)
    {
        $contact = ContactModel::find($id);

        if (!$contact) {
            abort(404, 'Kontakt nije pronađen.');
        }

        $contact->delete(); // Soft delete

        return redirect('/admin/all-contacts')->with('undoContact', $id);
    }
    public function undoDelete($id)
    {
        $contact = ContactModel::withTrashed()->find($id);

        if ($contact && $contact->trashed()) {
            $contact->restore();
        }

        return redirect('/admin/all-contacts');
    }
}
