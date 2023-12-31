<?php

namespace App\DTO\Products;

use App\Http\Requests\StoreUpdateProductRequest;

class ProductDTO{
    public function __construct(
        public string|null $id,
        public string $name,
        public float $price_cost,
        public float $price_sale,
        public float $quantity,
        public string $fabricated_at,
        public string $valid_until,
        public int $id_metric,
        public int $id_supplier,
        public int $id_brand
    ){}

    public static function makeFromRequest(StoreUpdateProductRequest $request, string $id = null){
        return new self (
            $id ?? $request->id,
            $request->name,
            $request->price_cost,
            $request->price_sale,
            $request->quantity,
            $request->fabricated_at,
            $request->valid_until,
            $request->id_metric,
            $request->id_supplier,
            $request->id_brand
        );
    }
}