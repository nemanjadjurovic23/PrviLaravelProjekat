<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomepageController extends Controller
{
    public function index()
    {
        $products = ProductsModel::all();

        $latestAdded = DB::table('products')->latest()->limit(6)->get();

        return view("welcome", compact( 'products', 'latestAdded'));
    }
}
