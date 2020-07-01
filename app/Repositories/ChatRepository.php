<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ChatRepository.
 *
 * @package namespace App\Repositories;
 */
interface ChatRepository extends RepositoryInterface
{
    public function store(array $input);
    public function getAll($send_id);
    public function getConversation(array $input);
}
