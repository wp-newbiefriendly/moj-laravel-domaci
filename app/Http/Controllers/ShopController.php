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
            'name' => 'required|unique:products|max:255',
            'description' => 'nullable|max:1000',
            'amount' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|string|max:255'
        ]);

        \App\Models\ProductModel::create($request->all());

        return redirect()->route(route:"admin.allproducts")->with('success', 'Proizvod dodat!');
    }

    public function editProduct(Request $request, ProductModel $product)
    {
        if(!$product === null) {
            die('Ovaj proizvod ne postoji!');
        }

        return view('products.edit', compact('product'));

    }

    public function updateProduct(Request $request, ProductModel $product)
    {
        $request->validate([
            'name' => 'required|unique:products,name,' . $product->id . '|max:255',
            'description' => 'nullable|max:1000',
            'amount' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|string|max:255'
        ]);

        // OVDE se ažuriraju podaci iz forme
        $product->name = $request->name;
        $product->description = $request->description;
        $product->amount = $request->amount;
        $product->price = $request->price;
        $product->image = $request->image;
        $product->save();

        return redirect('/admin/all-products')
            ->with('success', 'Proizvod ažuriran pod brojem ID: ' . $product->id);
    }

    public function undoDelete($id)
    {
        $product = ProductModel::withTrashed()->findOrFail($id);

        if ($product->trashed()) {
            $product->restore();
        }

        return redirect('/admin/all-products');
    }


}
