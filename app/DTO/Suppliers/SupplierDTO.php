<?php

namespace App\DTO\Suppliers;

use App\Http\Requests\StoreUpdateSupplierRequest;

class SupplierDTO{
    public function __construct(
        public string|null $id,
        public string $name,
        public string $email,
        public float $id_contact,
    ){}

    public static function makeFromRequest(StoreUpdateSupplierRequest $request, string $id = null){
        return new self (
            $id ?? $request->id,
            $request->name,
            $request->email,
            $request->id_contact,
        );
    }
}