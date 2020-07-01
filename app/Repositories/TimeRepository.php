<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface TimeRepository.
 *
 * @package namespace App\Repositories;
 */
interface TimeRepository extends RepositoryInterface
{
    public function storeMany(array $input);
}
