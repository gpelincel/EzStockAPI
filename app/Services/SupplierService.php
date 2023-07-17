<?php

namespace App\Services;

use App\DTO\Suppliers\SupplierDTO;
use App\Repositories\Supplier\SupplierRepositoryInterface;
use stdClass;

class SupplierService{
    public function __construct(
        protected SupplierRepositoryInterface $repository
    ){}

    public function getAll():array{
        return $this->repository->getAll();
    }

    public function getSingle(string $id):stdClass|null{
        return $this->repository->getSingle($id);
    }

    public function new(SupplierDTO $dto):stdClass{
        return $this->repository->new($dto);
    }

    public function update(SupplierDTO $dto):stdClass|null{
        return $this->repository->update($dto);
    }

    public function delete(string $id):void{
        $this->repository->delete($id);
    }
}