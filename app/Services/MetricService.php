<?php

namespace App\Services;

use App\Repositories\Metric\MetricRepositoryInterface;
use stdClass;

class MetricService{
    public function __construct(
        protected MetricRepositoryInterface $repository
    ){}

    public function getAll():array{
        return $this->repository->getAll();
    }

    public function getSingle(string $id):stdClass|null{
        return $this->repository->getSingle($id);
    }

    public function new($metric):stdClass{
        return $this->repository->new($metric);
    }

    public function update(string $id, $metric):stdClass|null{
        return $this->repository->update($id, $metric);
    }

    public function delete(string $id):void{
        $this->repository->delete($id);
    }
}