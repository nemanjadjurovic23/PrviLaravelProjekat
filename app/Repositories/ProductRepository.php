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

    public function createNew($request)
    {
        $this->productModel->create([
            "name" => $request->get("name"),
            "description" => $request->get("description"),
            "amount" => $request->get("amount"),
            "price" => $request->get("price"),
            "image" => $request->get("image")
        ]);
    }

    public function getProductById($id)
    {
        return $this->productModel->where(['id' => $id])->first();
    }

    public function updateProduct($request, ProductsModel $product)
    {
        $product->update([
            "name" => $request->get("name"),
            "description" => $request->get("description"),
            "amount" => $request->get("amount"),
            "price" => $request->get("price"),
            "image" => $request->get("image")
        ]);
    }
}
