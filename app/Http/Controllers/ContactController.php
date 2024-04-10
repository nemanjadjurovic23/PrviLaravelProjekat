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
}
