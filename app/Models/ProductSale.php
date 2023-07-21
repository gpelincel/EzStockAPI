<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSale extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'quantity',
        'total_unit',
        'id_product',
        'id_sale'
    ];
}
