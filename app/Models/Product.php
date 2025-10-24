<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // fungsinya adalah mrnimpa aturan primary key
    // protected $primarykey = 'id_produk';
    use HasFactory;
    protected $fillable = [
        'product_name',
        'unit',
        'type',
        'information',
        'qty',
        'producer',
    ];
}
