<?php

namespace App\Repositories;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class ProductRepository
{
    private $productmodel;
    public function __construct()
    {
        $this->productmodel = new ProductModel();
    }

    public function createNew($request)
    {
        $this->productmodel->create([
         "name" => $request->get('name'),
         "description" => $request->get('description'),
         "amount" => $request->get('amount'),
         "price" => $request->get('price'),
         "image" => $request->get('image')
        ]);
    }
    public function updateExist($request, $id)
    {
        // Pronađi proizvod sa specifičnim ID-jem
        $product = ProductModel::findOrFail($id);

        // Ažuriraj podatke iz request-a
        $product->name = $request->name;
        $product->description = $request->description;
        $product->amount = $request->amount;
        $product->price = $request->price;
        $product->image = $request->image;

        // Spasi promene
        $product->save();
    }

    public function deleteExist($id)
    {
        $product = ProductModel::where('id', $id)->firstOrFail();;

        $product->delete();

        session()->put('undoProduct', $product);
    }
    public function undoDeleteExist($id)
    {
        $product = ProductModel::withTrashed()->findOrFail($id);

        $product->restore();

        session()->forget('undoProduct');

    }

}
