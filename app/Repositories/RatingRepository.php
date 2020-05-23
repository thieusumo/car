<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface RatingRepository.
 *
 * @package namespace App\Repositories;
 */
interface RatingRepository extends RepositoryInterface
{
    public function getAll(array $input);
    public function percentStar(array $input);
}
