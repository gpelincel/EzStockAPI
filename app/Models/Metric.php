<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Metric extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "metric"
    ];

    public function product():HasMany{
        return $this->hasMany(Product::class, 'id_metric', 'id');
    }
}
