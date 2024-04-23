<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addProduct(Request $request)
    {
        $request->validate([
            "name" => "required|string",
            "description" => "required|string",
            "amount" => "required|integer",
            "price" => "required|numeric",
            "image" => "required|string"
        ]);

        ProductsModel::create([
            "name" => $request->get("name"),
            "description" => $request->get("description"),
            "amount" => $request->get("amount"),
            "price" => $request->get("price"),
            "image" => $request->get("image")
        ]);

        return redirect("/admin/products");
    }

    public function addProductForm()
    {
        return view("add-products");
    }

    public function allProducts()
    {
        $allProducts = ProductsModel::all();
        return view("allProducts", compact("allProducts"));
    }

    public function deleteProduct($product)
    {
        // SELECT * FROM products WHERE id = $product LIMIT 1
        $singleProduct = ProductsModel::where(['id' => $product])->first();

        if ($singleProduct === null) {
            die("OVAJ PROIZVOD NE POSTOJI");
        }

        $singleProduct->delete();

        // /admin/all-products -> delete -> back()
        return redirect()->back();
    }
}
