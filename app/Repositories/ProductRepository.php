<?php

namespace App\Repositories;

use App\Models\ProductsModel;

class ProductRepository
{

    private $productModel;

    public function __construct()
    {
        $this->productModel = new ProductsModel();
    }

    public function createNew($request, $imagePath)
    {
        $this->productModel->create([
            "name" => $request->get("name"),
            "description" => $request->get("description"),
            "amount" => $request->get("amount"),
            "price" => $request->get("price"),
            "image" => $imagePath  // Save the image path
        ]);
    }

    public function getProductById($id)
    {
        return $this->productModel->where(['id' => $id])->first();
    }

    public function updateProduct($request, ProductsModel $product)
    {
        $imagePath = $request->file('image') ? $request->file('image')->store('products', 'public') : $product->image;

        $product->update([
            "name" => $request->get("name"),
            "description" => $request->get("description"),
            "amount" => $request->get("amount"),
            "price" => $request->get("price"),
            "image" => $imagePath,
        ]);
    }
}
