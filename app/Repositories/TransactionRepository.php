<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Transaction;

class TransactionRepository implements TransactionsRepositoryInterface
{
    public function getAll()
    {
        return Transaction::all();
    }

    public function create(array $data)
    {
        return Transaction::create($data);
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }
}
