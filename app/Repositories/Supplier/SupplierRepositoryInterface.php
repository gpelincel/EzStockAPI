<?php

namespace App\Repositories\Supplier;

use App\DTO\Suppliers\SupplierDTO;
use stdClass;

interface SupplierRepositoryInterface{
    public function getAll():array;
    public function getSingle(int $id):stdClass|null;
    public function delete(int $id):void;
    public function new(SupplierDTO $dto):stdClass|null;
    public function update(SupplierDTO $dto):stdClass|null;
}