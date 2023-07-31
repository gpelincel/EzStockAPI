<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Brand;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'price_cost',
        'price_sale',
        'quantity',
        'fabricated_at',
        'valid_until',
        'id_metric',
        'id_supplier',
        'id_brand'
    ];

    public function brand(): BelongsTo{
        return $this->belongsTo(Brand::class, 'id_brand', 'id');
    }

    public function supplier(): BelongsTo{
        return $this->belongsTo(Supplier::class, 'id_supplier', 'id');
    }

    public function product_sales(): BelongsTo{
        return $this->belongsTo(ProductSale::class, 'id_product_sales', 'id');
    }
}
