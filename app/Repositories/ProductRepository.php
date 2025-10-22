<?php

namespace App\Repositories;

use App\Models\ProductModel;

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
        // Pronađi proizvod sa specifičnim ID-jem
        $product = ProductModel::findOrFail($id);

        // Obriši proizvod
        $product->delete();
    }
    public function undoDeleteExist($id)
    {
        // Pronađi obrisani proizvod sa specifičnim ID-jem
        $product = ProductModel::withTrashed()->findOrFail($id);

        // Ako je proizvod u trash-u, restauriraj ga
        if ($product->trashed()) {
            $product->restore();
        }
    }



}
