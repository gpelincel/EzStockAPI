<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "price_cost" => $this->price_cost,
            "price_sale" => $this->price_sale,
            "quantity" => $this->quantity,
            "fabricated_at" => Carbon::make($this->fabricated_at)->format('dd-MM-yyyy'),
            "valid_until" => Carbon::make($this->valid_until)->format('dd-MM-yyyy'),
            "id_metric" => $this->id_metric,
            "id_supplier" => $this->id_supplier,
            "id_brand" => $this->id_brand,
        ];
    }
}
