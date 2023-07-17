<?php

namespace App\Repositories\Brand;

use stdClass;

interface BrandRepositoryInterface{
    public function getAll():array;
    public function getSingle(string $id):stdClass|null;
    public function delete(string $id):void;
    public function new($name):stdClass|null;
    public function update(string $id, $name):stdClass|null;
}