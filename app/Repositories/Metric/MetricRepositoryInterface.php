<?php

namespace App\Repositories\Metric;

use stdClass;

interface MetricRepositoryInterface{
    public function getAll():array;
    public function getSingle(string $id):stdClass|null;
    public function delete(string $id):void;
    public function new($metric):stdClass|null;
    public function update(string $id, $metric):stdClass|null;
}