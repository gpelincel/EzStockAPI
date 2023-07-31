<?php

namespace App\DTO\ProductSales;

use App\Http\Requests\StoreUpdateProductSaleRequest;

class ProductSaleDTO{
    public function __construct(
        public string|null $id,
        public float $quantity,
        public float $total_unit,
        public int $id_sale,
        public int $id_product
    ){}

    public static function makeFromRequest(StoreUpdateProductSaleRequest $request, string $id = null){
        return new self (
            $id ?? $request->id,
            $request->quantity,
            $request->total_unit,
            $request->id_sale,
            $request->id_product
        );
    }
}