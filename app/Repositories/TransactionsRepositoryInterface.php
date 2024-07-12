<?php

declare(strict_types=1);

namespace App\Repositories;

interface TransactionsRepositoryInterface
{
    public function getAll();
    public function create(array $data);
    public function delete(int $id);
}
