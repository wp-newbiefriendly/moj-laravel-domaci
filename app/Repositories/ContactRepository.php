<?php

namespace App\Repositories;

use App\Models\ContactModel;
use Illuminate\Http\Request;

class ContactRepository
{
    private $contactModel;

    public function __construct()
    {
        $this->contactModel = new ContactModel();
    }
    public function sendContact(Request $request)
    {
        $this->contactModel->create([
                'email' => $request->get('email'),
                'subject' => $request->get('subject'),
                'message' => $request->get('description')
            ]);
    }
    public function deleteContact($id)
    {
        $contact = ContactModel::find($id);

        if (!$contact) {
            abort(404, 'Kontakt nije pronađen.');
        }
       $contact->delete(); // Soft delete
    }
    public function undoDelete($id)
    {
        $contact = ContactModel::withTrashed()->find($id);

        if ($contact && $contact->trashed()) {
            $contact->restore();
        }
    }
}
