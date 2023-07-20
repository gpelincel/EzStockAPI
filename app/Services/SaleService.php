<?php

namespace App\Services;

use App\DTO\Sales\SaleDTO;
use App\Repositories\Sale\SaleRepositoryInterface;
use stdClass;

class SaleService{
    public function __construct(
        protected SaleRepositoryInterface $repository
    ){}

    public function getAll():array{
        return $this->repository->getAll();
    }

    public function getSingle(string $id):stdClass|null{
        return $this->repository->getSingle($id);
    }

    public function new(SaleDTO $dto):stdClass{
        return $this->repository->new($dto);
    }

    public function update(SaleDTO $dto):stdClass|null{
        return $this->repository->update($dto);
    }

    public function delete(string $id):void{
        $this->repository->delete($id);
    }
}