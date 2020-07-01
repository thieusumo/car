<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface RouteRepository.
 *
 * @package namespace App\Repositories;
 */
interface RouteRepository extends RepositoryInterface
{
    public function list();
    public function listActive();
    public function remove($id);
    public function store(array $input);
    public function update(array $input, $id);
}
