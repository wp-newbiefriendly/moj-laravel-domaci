<?php

namespace App\Http\Controllers;

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

// POST: addProduct.blade.php - vrati u bazu i snimi podatke sa porukom Proizvod dodat!
    public function storeProduct(Request $request) {
        $request->validate([
            'name' => 'required|unique:products|max:255',
            'description' => 'nullable|max:1000',
            'amount' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|string|max:255'
        ]);

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
        $this->productRepo->updateExist($request, $product->id);

        return redirect('/admin/all-products')
            ->with('success', 'Proizvod ažuriran pod brojem ID: ' . $product->id);
    }

    public function undoDelete($id)
    {
        // Pozivamo metodu iz repo-a za vraćanje proizvoda
        $this->productRepo->undoDeleteExist($id);

        // Brisanje podatka iz sesije nakon poništavanja brisanja
        session()->forget('undoProduct');

        // Preusmeravamo korisnika na prethodnu stranicu sa porukom o uspehu
        return redirect()->back()->with('success', 'Proizvod je uspešno vraćen.');
    }

}
