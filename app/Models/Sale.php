<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_sale',
        'total_cost',
    ];

    public function product_sales(): BelongsTo{
        return $this->belongsTo(ProductSale::class, 'id_product_sale', 'id');
    }
}
