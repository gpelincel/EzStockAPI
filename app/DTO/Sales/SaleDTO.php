<?php

namespace App\DTO\Sales;

use App\Http\Requests\StoreUpdateSaleRequest;

class SaleDTO{
    public function __construct(
        public string|null $id,
        public float $total_cost,
        public float $total_sale,
    ){}

    public static function makeFromRequest(StoreUpdateSaleRequest $request, string $id = null){
        return new self (
            $id ?? $request->id,
            $request->total_cost,
            $request->total_sale,
        );
    }
}