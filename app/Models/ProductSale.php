<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function products():HasMany
    {
        return $this->hasMany(Product::class, 'id_product', 'id_product');
    }

    public function sales():HasMany{
        return $this->hasMany(Sale::class, 'id_sale', 'id_sale');
    }
}
