<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Account;
use Illuminate\Database\Eloquent\Collection;

class AccountRepository implements AccountRepositoryInterface
{
    public function getAll(): Collection
    {
        return Account::all();
    }

    public function create(array $data)
    {
        return Account::create($data);
    }

    public function update(int $id, array $data)
    {
        return Account::find($id)
            ->update($data);
    }
}
