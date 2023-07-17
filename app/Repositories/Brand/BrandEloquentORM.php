<?php

namespace App\Repositories\Brand;

use App\Http\Requests\StoreUpdateBrandRequest;
use App\Models\Brand;
use App\Repositories\Brand\BrandRepositoryInterface;
use stdClass;

class BrandEloquentORM implements BrandRepositoryInterface{
    public function __construct(protected Brand $model)
    {}

    public function getAll():array{
        return $this->model->get()->toArray();
    }

    public function getSingle(string $id): stdClass|null
    {
        $brand = $this->model->find($id);

        if (!$brand) {
            return null;
        }

        return (object) $brand->toArray();
    }

    public function new($name):stdClass{
        $model = $this->model;

        $brand = $model->create((array) $name);

        return (object) $brand->toArray();
    }

    public function update(string $id, $name):stdClass|null{
        if (!$brand = $this->model->find($id)) {
            return null;
        }

        $brand->update((array) $name);

        return (object) $brand->toArray();
    }

    public function delete(string $id): void
    {
        $this->model->findOrFail($id)->delete();
    }
}