<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $sat = date('H');
        $trenutnoVreme = date("H:i:s");

        $products = ProductsModel::all();

        return view("welcome", compact('trenutnoVreme', 'sat', 'products'));
    }
}
