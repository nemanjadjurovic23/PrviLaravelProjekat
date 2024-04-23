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
            "email" => "required|string", // if(isset($_POST['email]) && is_string($_POST['email'])
            "subject" => "required|string",
            "description" => "required|min:5|string", // description mora biti barem 5 slova
        ]);

        // $sql->query("INSERT INTO contact (email, subject, description) VALUES ('$email', '$subject', '$description'")
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
}
