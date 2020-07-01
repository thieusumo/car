<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface QuestionRepository.
 *
 * @package namespace App\Repositories;
 */
interface QuestionRepository extends RepositoryInterface
{
    public function activeQuestion(array $input,$take=0);
    public function store(array $input);
    public function allQuestion($car_id);
    public function changeStatus($car_id);
    public function notActiveQuestion($car_id);
}
