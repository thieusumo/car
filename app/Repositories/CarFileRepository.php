<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface CarFileRepository.
 *
 * @package namespace App\Repositories;
 */
interface CarFileRepository extends RepositoryInterface
{
    public function storeArray(array $input);
    public function getOne($car_id);
    public function remove($id);
}
