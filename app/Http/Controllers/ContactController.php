<?php

// virtuelna putanja do samog kontrolera
namespace App\Http\Controllers;

// require_once "Illuminate\Http\Request"
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view("contact");
    }
}
