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

    public function deleteContact($contact)
    {
        $singleContact = $this->contactRepo->getContactById($contact);

        if ($singleContact === null) {
            die("Contact not found");
        }
        $singleContact->delete();
        return redirect()->back();
    }

    public function editContact($contact)
    {
        $singleContact = $this->contactRepo->getContactById($contact);

        if ($singleContact === null) {
            die("Contact not found");
        }
        return view("edit-contact", compact('singleContact'));
    }

    public function updateContact(Request $request, ContactModel $contact)
    {
        $this->contactRepo->updateContact($request, $contact);
        return redirect()->route("sviKontakti")->with("success", "Kontak je uspesno azuriran");
    }
}
