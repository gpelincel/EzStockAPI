<?php

namespace App\Repositories\Sale;

use App\DTO\Sales\SaleDTO;
use stdClass;

interface SaleRepositoryInterface{
    public function getAll():array;
    public function getSingle(string $id):stdClass|null;
    public function delete(string $id):void;
    public function new(SaleDTO $dto):stdClass|null;
    public function update(SaleDTO $dto):stdClass|null;
}