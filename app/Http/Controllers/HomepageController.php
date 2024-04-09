<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $sat = date('H');
        $trenutnoVreme = date("H:i:s");

        $products = Products::all();

        return view("welcome", compact('trenutnoVreme', 'sat', 'products'));
    }
}
