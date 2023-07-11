<?php

namespace App\Repositories;

use App\DTO\Products\ProductDTO;
use App\Models\Product;
use App\Repositories\ProductRepositoryInterface;
use stdClass;

class ProductEloquentORM implements ProductRepositoryInterface{
    public function __construct(protected Product $model)
    {}

    public function getAll():array{
        return $this->model->get()->toArray();
    }

    public function getSingle(string $id): stdClass|null
    {
        $product = $this->model->find($id);

        if (!$product) {
            return null;
        }

        return (object) $product->toArray();
    }

    public function new(ProductDTO $dto):stdClass{
        $product = $this->model->create((array) $dto);

        return (object) $product->toArray();
    }

    public function update(ProductDTO $dto):stdClass|null{
        if (!$product = $this->model->find($dto->id)) {
            return null;
        }

        $product->update((array) $dto);

        return (object) $product->toArray();
    }

    public function delete(string $id): void
    {
        $this->model->findOrFail($id)->delete();
    }
}