<?php

namespace App\Http\Controllers;

use App\Http\Requests\sendContact;
use App\Http\Requests\updateContact;
use Illuminate\Http\Request;
use App\Models\ContactModel;
use App\Repositories\ContactRepository;
class ContactController extends Controller
{
    private $contactRepo;
    public function __construct()
    {
        $this->contactRepo = new ContactRepository();
    }
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
    public function sendContact(sendContact $request)
    {
        $this->contactRepo->sendContact($request);

        return redirect(to:'/shop');
    }
    public function deleteContact($id)
    {
        $this->contactRepo->deleteContact($id); // ContactRepository->deleteContact

        return redirect()->route('contacts.all')->with('undoContact', $id);
    }
    public function undoDelete($id)
    {
        $this->contactRepo->undoDelete($id);

        return redirect()->route('contacts.all');
    }
    public function showTrashedContacts()
    {
        $trashedContacts = ContactModel::onlyTrashed()->get();
        return view('trashedContacts', compact('trashedContacts'));
    }

    public function editContact(ContactModel $contact) {

        return view('editContact', compact('contact'));
    }

    public function updateContact(updateContact $request, ContactModel $contact) {

        $this->contactRepo->updateExist($request, $contact->id);

        return redirect()->route('contacts.all')
            ->with('success', 'Kontakt ažuriran pod brojem ID: ' . $contact->id);
    }

}
