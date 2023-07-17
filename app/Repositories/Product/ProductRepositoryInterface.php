<?php

namespace App\Repositories\Product;

use App\DTO\Products\ProductDTO;
use stdClass;

interface ProductRepositoryInterface{
    public function getAll():array;
    public function getSingle(string $id):stdClass|null;
    public function delete(string $id):void;
    public function new(ProductDTO $dto):stdClass|null;
    public function update(ProductDTO $dto):stdClass|null;
}