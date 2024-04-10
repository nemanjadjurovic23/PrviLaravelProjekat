<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class ShopController extends Controller
{
    public function index()
    {
        $products = ProductsModel::all();

        return view("shop", compact('products'));
    }
}
