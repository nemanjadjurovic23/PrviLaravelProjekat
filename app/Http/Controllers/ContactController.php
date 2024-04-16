<?php

// virtuelna putanja do samog kontrolera
namespace App\Http\Controllers;

// require_once "Illuminate\Http\Request"
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
        $allContacts = ContactModel::all(); // SELECT * FROM contacts -> vadi sve contacte iz baze
        return view("allContacts", compact("allContacts")); // ucitavamo allContacts.blade.php i prosledjujemo varijablu $allContacts
    }

    public function sendContact(Request $request)
    {
        $request->validate([
            // "name" => "pravila"
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
}
