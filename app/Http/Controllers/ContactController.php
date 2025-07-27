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
        $allContacts = ContactModel::all(); // aktivni
        $trashedContacts = ContactModel::onlyTrashed()->get(); // obrisani
        $trashedCount = $trashedContacts->count();

        return view("allContacts", compact('allContacts', 'trashedContacts', 'trashedCount'));
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
    public function showTrashedContacts()
    {
        $trashedContacts = ContactModel::onlyTrashed()->get();
        return view('trashedContacts', compact('trashedContacts'));
    }


    public function editContact(Request $request, ContactModel $contact) {

        return view('editContact', compact('contact'));
    }

    public function updateContact(Request $request, ContactModel $contact) {
        $request->validate([
            'email' => 'required|string',
            'subject' => 'required|string',
            'message' => 'nullable|max:1000'
        ]);

        $contact->update($request->all());

        return redirect('/admin/all-contacts')
            ->with('success', 'Kontakt ažuriran pod brojem ID: ' . $contact->id);
    }
}
