<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // 👈 Add this

class Product extends Model
{

     use HasFactory; 
        protected $table = "products";


    protected $fillable = [
        'name',
       
    ];

}
