<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeProduct;
use App\Http\Requests\updateProduct;
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
    public function showAddProductForm() {
        return view('addProduct'); // blade::addProduct.blade.php - forma + link "svi proizvodi"
    }

// POST: addProduct.blade.php - vrati u bazu i snimi podatke sa porukom
    public function storeProduct(storeProduct $request) {

        $this->productRepo->createNew($request);

        return redirect()->route(route:"admin.allproducts")->with('success', 'Proizvod dodat!');
    }

    public function editProduct(ProductModel $product)
    {
        if(!$product === null) {
            die('Ovaj proizvod ne postoji!');
        }
        return view('products.edit', compact('product'));

    }

    public function updateProduct(updateProduct $request, ProductModel $product)
    {
        $this->productRepo->updateExist($request, $product->id);

        return redirect('/admin/all-products')
            ->with('success', 'Proizvod ažuriran pod brojem ID: ' . $product->id);
    }

    public function undoDelete($id)
    {
        $this->productRepo->undoDeleteExist($id);

        return redirect()->back()->with('success', 'Proizvod je uspešno vraćen.');
    }



}
