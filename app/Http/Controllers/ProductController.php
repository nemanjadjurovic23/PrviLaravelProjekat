<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Models\ProductsModel;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productRepo;

    public function __construct()
    {
        $this->productRepo = new ProductRepository();
    }

    public function permalink(ProductsModel $product)
    {
        return view('products.permalink', compact('product'));
    }
    public function saveProduct(AddProductRequest $request)
    {
        $imagePath = $request->file('image')->store('products', 'public');
        $this->productRepo->createNew($request, $imagePath);

        return redirect()->route("product.all");
    }

    public function addProduct()
    {
        return view("add-products");
    }

    public function allProducts()
    {
        $allProducts = ProductsModel::all();
        return view("allProducts", compact("allProducts"));
    }

    public function deleteProduct(ProductsModel $product)
    {
        $product->delete();
        return redirect()->back();
    }

    public function editProduct(ProductsModel $product)
    {
        return view("edit-product", compact('product'));
    }

    public function updateProduct(EditProductRequest $request, ProductsModel $product)
    {
        $this->productRepo->updateProduct($request, $product);
        return redirect()->route("product.all")->with("success", "Product successfully updated.");
    }

}
