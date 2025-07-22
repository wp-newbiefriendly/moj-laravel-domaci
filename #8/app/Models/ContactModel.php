<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactModel extends Model
{
    use SoftDeletes;

    protected $table = "contact"; //ContactModel -> "contact"

    protected $fillable = [
        "email", "subject", "message" // Polja koja se mogu modifikovati i koristiti!
    ];

}
