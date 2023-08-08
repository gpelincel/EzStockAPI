<?php

namespace App\Repositories\Metric;

use App\Http\Requests\StoreUpdateMetricRequest;
use App\Models\Metric;
use App\Repositories\Metric\MetricRepositoryInterface;
use stdClass;

class MetricEloquentORM implements MetricRepositoryInterface{
    public function __construct(protected Metric $model)
    {}

    public function getAll():array{
        return $this->model->get()->toArray();
    }

    public function getSingle(string $id): stdClass|null
    {
        $metric = $this->model->find($id);

        if (!$metric) {
            return null;
        }

        return (object) $metric->toArray();
    }

    public function new($metric):stdClass{
        $model = $this->model;

        $metric = $model->create((array) $metric);

        return (object) $metric->toArray();
    }

    public function update(string $id, $metric):stdClass|null{
        if (!$metric = $this->model->find($id)) {
            return null;
        }

        $metric->update((array) $metric);

        return (object) $metric->toArray();
    }

    public function delete(string $id): void
    {
        $this->model->findOrFail($id)->delete();
    }
}