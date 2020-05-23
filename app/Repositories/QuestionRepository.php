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
    public function activeQuestion();
    public function store(array $input);
}
