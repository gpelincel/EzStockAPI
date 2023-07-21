<?php

namespace App\Services;

use App\DTO\ProductSales\ProductSaleDTO;
use App\Repositories\ProductSale\ProductSaleRepositoryInterface;
use stdClass;

class ProductSaleService{
    public function __construct(
        protected ProductSaleRepositoryInterface $repository
    ){}

    public function getAll():array{
        return $this->repository->getAll();
    }

    public function getSingle(string $id):stdClass|null{
        return $this->repository->getSingle($id);
    }

    public function new(ProductSaleDTO $dto):stdClass{
        return $this->repository->new($dto);
    }

    public function update(ProductSaleDTO $dto):stdClass|null{
        return $this->repository->update($dto);
    }

    public function delete(string $id):void{
        $this->repository->delete($id);
    }
}