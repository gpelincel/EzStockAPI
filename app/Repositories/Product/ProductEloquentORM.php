<?php

namespace App\Repositories\Product;

use App\DTO\Products\ProductDTO;
use App\Models\Product;
use App\Repositories\Product\ProductRepositoryInterface;
use stdClass;

class ProductEloquentORM implements ProductRepositoryInterface{
    public function __construct(protected Product $model)
    {}

    public function getAll():array{
        return $this->model->with('metric')->with('brand')->with('supplier')->get()->toArray();
    }

    public function getSingle(string $id): stdClass|null
    {
        $product = $this->model->with('metric')->with('brand')->with('supplier')->find($id);

        if (!$product) {
            return null;
        }

        return (object) $product->toArray();
    }

    public function new(ProductDTO $dto):stdClass{
        $model = $this->model;

        $product = $model->create((array) $dto);

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