<?php

namespace App\Repositories\Sale;

use App\DTO\Sales\SaleDTO;
use App\Models\Sale;
use App\Repositories\Sale\SaleRepositoryInterface;
use stdClass;

class SaleEloquentORM implements SaleRepositoryInterface{
    public function __construct(protected Sale $model)
    {}

    public function getAll():array{
        return $this->model->get()->toArray();
    }

    public function getSingle(string $id): stdClass|null
    {
        $sale = $this->model->find($id);

        if (!$sale) {
            return null;
        }

        return (object) $sale->toArray();
    }

    public function new(SaleDTO $dto):stdClass{
        $model = $this->model;

        $sale = $model->create((array) $dto);

        return (object) $sale->toArray();
    }

    public function update(SaleDTO $dto):stdClass|null{
        if (!$sale = $this->model->find($dto->id)) {
            return null;
        }

        $sale->update((array) $dto);

        return (object) $sale->toArray();
    }

    public function delete(string $id): void
    {
        $this->model->findOrFail($id)->delete();
    }
}