<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendContactRequest;
use App\Models\ContactModel;
use App\Repositories\ContactRepository;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $contactRepo;

    public function __construct()
    {
        $this->contactRepo = new ContactRepository();
    }
    public function index()
    {
        return view("contact");
    }

    public function getAllContacts()
    {
        $allContacts = ContactModel::all();
        return view("allContacts", compact("allContacts"));
    }

    public function sendContact(SendContactRequest $request)
    {
        $this->contactRepo->createContact($request);
        return redirect()->route('shop');
    }

    public function deleteContact(ContactModel $contact)
    {
        $contact->delete();
        return redirect()->back();
    }

    public function editContact(ContactModel $contact)
    {
        return view("edit-contact", compact('contact'));
    }

    public function updateContact(Request $request, ContactModel $contact)
    {
        $this->contactRepo->updateContact($request, $contact);
        return redirect()->route("allContacts")->with("success", "Kontak je uspesno azuriran");
    }
}
