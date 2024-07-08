<?php

namespace App\Repositories;

use App\Models\ContactModel;

class ContactRepository
{
    private $contactModel;

    public function __construct()
    {
        $this->contactModel = new ContactModel();
    }

    public function createContact($request)
    {
        $this->contactModel->create([
            "email" => $request->get("email"),
            "subject" => $request->get("subject"),
            "message" => $request->get("message")
        ]);
    }

    public function getContactById($id)
    {
        return $this->contactModel->where(['id' => $id])->first();
    }

    public function updateContact($request, ContactModel $contact)
    {
        $contact->update([
            "email" => $request->get("email"),
            "subject" => $request->get("subject"),
            "message" => $request->get("message")
        ]);

    }
}
