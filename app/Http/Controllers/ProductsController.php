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
    public function showALLProducts() {
        $products = \App\Models\ProductModel::all();
        return view('allProducts', compact('products'));
    }

    public function deleteProduct($id)
    {
        // Nađite proizvod
        $product = ProductModel::findOrFail($id);

        // Soft delete proizvoda
        $product->delete();

        // Spremite proizvod u sesiju za undo
        session()->put('undoProduct', $product);

        // Preusmerite nazad sa porukom
        return redirect()->back()->with('success', 'Proizvod je uspešno obrisan.');
    }



}
