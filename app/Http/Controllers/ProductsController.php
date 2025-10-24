<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    private $productRepo;
    public function __construct()
    {
        $this->productRepo = new ProductRepository();
    }
    // GET: Prikaz svih proizvoda
    public function showAllProducts() {
        $products = \App\Models\ProductModel::all();
        return view('allProducts', compact('products'));
    }

    public function deleteProduct($id)
    {
        $this->productRepo->deleteExist($id);
        return redirect()->back()->with('success', 'Proizvod je uspešno obrisan.');
    }



}
