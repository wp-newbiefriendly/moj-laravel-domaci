<?php

namespace App\Http\Controllers;

use App\Models\ContactModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $products = ProductModel::all();

        return view('shop', compact('products'));
    }

    // GET: Prikaz forme
    public function showAddProductForm() {
        return view('addProduct'); // blade::addProduct.blade.php - forma + link "svi proizvodi"
    }

// POST: addProduct.blade.php - vrati u bazu i snimi podatke sa porukom Proizvod dodat!
    public function storeProduct(Request $request) {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|max:1000',
            'amount' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|string|max:255'
        ]);

        \App\Models\ProductModel::create($request->all());

        return redirect('/admin/products')->with('success', 'Proizvod dodat!');
    }

// GET: Prikaz svih proizvoda
    public function showAllProducts() {
        $products = \App\Models\ProductModel::all();
        return view('allProducts', compact('products')); // napravi ovaj blade
    }
    public function editProduct($id) {
        $product = ProductModel::findOrFail($id);
        return view('editProduct', compact('product'));
    }

    public function updateProduct(Request $request, $id) {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|max:1000',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|string|max:255'
        ]);

        $product = ProductModel::findOrFail($id);
        $product->update($request->all());

        return redirect('/admin/products')->with('success', 'Proizvod ažuriran!');
    }
}
