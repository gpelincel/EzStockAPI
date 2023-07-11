<?php

namespace App\Services;

use App\DTO\Products\ProductDTO;
use App\Repositories\ProductRepositoryInterface;
use stdClass;

class ProductService{
    public function __construct(
        protected ProductRepositoryInterface $repository
    ){}

    public function getAll():array{
        return $this->repository->getAll();
    }

    public function getSingle(string $id):stdClass|null{
        return $this->repository->getSingle($id);
    }

    public function new(ProductDTO $dto):stdClass{
        return $this->repository->new($dto);
    }

    public function update(ProductDTO $dto):stdClass|null{
        return $this->repository->update($dto);
    }

    public function delete(string $id):void{
        $this->repository->delete($id);
    }
}