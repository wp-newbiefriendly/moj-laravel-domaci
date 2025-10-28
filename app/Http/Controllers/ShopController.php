<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeProduct;
use App\Http\Requests\updateProduct;
use App\Models\ContactModel;
use App\Models\ProductModel;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    private $productRepo;
    public function __construct()
    {
        $this->productRepo = new ProductRepository();
    }
    public function index()
    {
        $products = ProductModel::all();
        return view('shop', compact('products'));
    }

}
