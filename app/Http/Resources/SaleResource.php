<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SaleResource extends JsonResource
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
            "total_sale" => $this->total_sale,
            "total_cost" => $this->total_cost,
            "sale_made_at" => Carbon::make($this->created_at)->format("d-M-y"),
        ];
    }
}
