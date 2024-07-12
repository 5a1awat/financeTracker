<?php

declare(strict_types=1);

namespace App\Services;

use App\Enums\TransactionType;
use App\Models\Category;
use App\Models\Country;
use App\Repositories\TransactionsRepositoryInterface;

class TransactionService
{
    public function __construct(
        private readonly TransactionsRepositoryInterface $transactionsRepository
    ) {
    }

    public function getAll()
    {
        return $this->transactionsRepository->getAll();
    }

    public function getCategories()
    {
        return Category::all();
    }

    public function getCountries()
    {
        return Country::all();
    }

    public function getTypes(): array
    {
        return TransactionType::toArray();
    }

    public function create(array $data)
    {
        return $this->transactionsRepository->create($data);
    }
}
