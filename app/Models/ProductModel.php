<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductModel extends Model
{
    use SoftDeletes;

      protected $table = "products";

      protected $fillable = [
          'name', 'description', 'amount', 'price', 'image'
      ];

}

