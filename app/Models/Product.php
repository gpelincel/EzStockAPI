<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public function brand(): HasOne{
        return $this->hasOne(Brand::class, 'id_brand');
    }
}
