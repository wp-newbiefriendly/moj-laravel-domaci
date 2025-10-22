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

    // GET: Prikaz forme
    public function showAddProductForm() {
        return view('addProduct'); // blade::addProduct.blade.php - forma + link "svi proizvodi"
    }

// POST: addProduct.blade.php - vrati u bazu i snimi podatke sa porukom
    public function storeProduct(storeProduct $request) {

        $this->productRepo->createNew($request);

        return redirect()->route(route:"admin.allproducts")->with('success', 'Proizvod dodat!');
    }

    public function editProduct(Request $request, ProductModel $product)
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
