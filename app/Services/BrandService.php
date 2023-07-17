<?php

namespace App\Services;

use App\DTO\Brands\BrandDTO;
use App\Repositories\Brand\BrandRepositoryInterface;
use stdClass;

class BrandService{
    public function __construct(
        protected BrandRepositoryInterface $repository
    ){}

    public function getAll():array{
        return $this->repository->getAll();
    }

    public function getSingle(string $id):stdClass|null{
        return $this->repository->getSingle($id);
    }

    public function new($name):stdClass{
        return $this->repository->new($name);
    }

    public function update(string $id, $name):stdClass|null{
        return $this->repository->update($id, $name);
    }

    public function delete(string $id):void{
        $this->repository->delete($id);
    }
}