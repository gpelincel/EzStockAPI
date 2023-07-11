<?php

namespace App\DTO\Products;

use App\Http\Requests\StoreUpdateProductRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CreateProductDTO{
    public function __construct(
        string $name,
        float $price_cost,
        float $price_sale,
        float $quantity,
        string $fabricated_at,
        string $valid_until,
        int $id_metric,
        int $id_supplier,
        int $id_brand
    ){

    }

    public function makeFromRequest(StoreUpdateProductRequest $request){
        return new self (
            $request->name,
            $request->price_cost,
            $request->price_sale,
            $request->quantity,
            date_create_from_format("dd-MM-yyyy", $request->fabricated_at),
            date_create_from_format("dd-MM-yyyy", $request->valid_until),
            $request->id_metric,
            $request->id_supplier,
            $request->id_brand
        );
    }
}