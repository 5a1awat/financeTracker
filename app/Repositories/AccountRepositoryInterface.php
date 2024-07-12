<?php

declare(strict_types=1);

namespace App\Repositories;

interface AccountRepositoryInterface
{
    public function getAll();
    public function create(array $data);
    public function update(int $id, array $data);
}
