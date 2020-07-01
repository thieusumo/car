<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface CarRepository.
 *
 * @package namespace App\Repositories;
 */
interface CarRepository extends RepositoryInterface
{
    public function getOne($id);

    public function store(array $input);

    public function carInRoute($route_id);

    public function getAll();

    public function update(array $input, $id);
}
