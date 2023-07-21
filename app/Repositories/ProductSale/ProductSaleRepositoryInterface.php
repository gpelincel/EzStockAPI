<?php

namespace App\Repositories\ProductSale;

use App\DTO\ProductSales\ProductSaleDTO;
use stdClass;

interface ProductSaleRepositoryInterface{
    public function getAll():array;
    public function getSingle(string $id):stdClass|null;
    public function delete(string $id):void;
    public function new(ProductSaleDTO $dto):stdClass|null;
    public function update(ProductSaleDTO $dto):stdClass|null;
}