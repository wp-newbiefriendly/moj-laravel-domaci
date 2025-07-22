<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    // GET: Prikaz svih proizvoda
    public function showALLProducts() {
        $products = \App\Models\ProductModel::all();
        return view('allProducts', compact('products'));
    }

    public function deleteProduct($product)
    {
        $singleProduct = ProductModel::where(['id' => $product])->first();
        if ($singleProduct === null)
        {
            die('Product not found');
        }
        $singleProduct->delete();
        return redirect()->back();
    }
}
