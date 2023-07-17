<?php

namespace App\Repositories\Supplier;

use App\DTO\Suppliers\SupplierDTO;
use App\Models\Supplier;
use App\Repositories\Supplier\SupplierRepositoryInterface;
use stdClass;

class SupplierEloquentORM implements SupplierRepositoryInterface{
    public function __construct(protected Supplier $model)
    {}

    public function getAll():array{
        return $this->model->get()->toArray();
    }

    public function getSingle(string $id): stdClass|null
    {
        $supplier = $this->model->find($id);

        if (!$supplier) {
            return null;
        }

        return (object) $supplier->toArray();
    }

    public function new(SupplierDTO $dto):stdClass{
        $model = $this->model;

        $supplier = $model->create((array) $dto);

        return (object) $supplier->toArray();
    }

    public function update(SupplierDTO $dto):stdClass|null{
        if (!$supplier = $this->model->find($dto->id)) {
            return null;
        }

        $supplier->update((array) $dto);

        return (object) $supplier->toArray();
    }

    public function delete(string $id): void
    {
        $this->model->findOrFail($id)->delete();
    }
}