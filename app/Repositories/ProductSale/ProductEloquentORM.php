<?php

namespace App\Repositories\ProductSale;

use App\DTO\ProductSales\ProductSaleDTO;
use App\Models\ProductSale;
use App\Repositories\ProductSale\ProductSaleRepositoryInterface;
use stdClass;

class ProductSaleEloquentORM implements ProductSaleRepositoryInterface{
    public function __construct(protected ProductSale $model)
    {}

    public function getAll():array{
        return $this->model->get()->toArray();
    }

    public function getSingle(string $id): stdClass|null
    {
        $product_sale = $this->model->find($id);

        if (!$product_sale) {
            return null;
        }

        return (object) $product_sale->toArray();
    }

    public function new(ProductSaleDTO $dto):stdClass{
        $model = $this->model;

        $product_sale = $model->create((array) $dto);

        return (object) $product_sale->toArray();
    }

    public function update(ProductSaleDTO $dto):stdClass|null{
        if (!$product_sale = $this->model->find($dto->id)) {
            return null;
        }

        $product_sale->update((array) $dto);

        return (object) $product_sale->toArray();
    }

    public function delete(string $id): void
    {
        $this->model->findOrFail($id)->delete();
    }
}