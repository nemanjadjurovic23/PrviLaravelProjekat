<?php

namespace App\Http\Controllers;

use App\Models\ContactModel;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view("contact");
    }

    public function getAllContacts()
    {
        $allContacts = ContactModel::all();
        return view("allContacts", compact("allContacts"));
    }

    public function sendContact(Request $request)
    {
        $request->validate([
            "email" => "required|string",
            "subject" => "required|string",
            "description" => "required|min:5|string",
        ]);

        ContactModel::create([
            "email" => $request->get("email"),
            "subject" => $request->get("subject"),
            "message" => $request->get("description")
        ]);

        return redirect("/shop");
    }

    public function deleteContact($contact)
    {
        $contact = ContactModel::where(['id'=>$contact])->first();
        if ($contact === null) {
            die("Contact not found");
        }

        $contact->delete();

        return redirect()->back();
    }

    public function editContact($contact)
    {
        $singleContact = ContactModel::where(['id'=>$contact])->first();

        if ($singleContact === null) {
            die("Contact not found");
        }

        return view("edit-contact", compact('singleContact'));
    }

    public function updateContact(Request $request, $contact)
    {
        $request->validate([
           "email" => "required|string",
           "subject" => "required|string",
           "message" => "required|min:5|string"
        ]);

        $contactToUpdate = ContactModel::findOrFail($contact);
        $contactToUpdate->update([
           "email" => $request->get("email"),
           "subject" => $request->get("subject"),
           "message" => $request->get("message")
        ]);

        return redirect()->route("sviKontakti")->with("success", "Kontak je uspesno azuriran");
    }
}
