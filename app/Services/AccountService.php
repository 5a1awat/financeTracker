<?php

declare(strict_types=1);

namespace App\Services;

use App\Enums\AccountType;
use App\Models\Currency;
use App\Repositories\AccountRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as CollectionSupport;

class AccountService
{
    public function __construct(
        private readonly AccountRepositoryInterface $accountRepository,
        private readonly BalanceCalculation $balanceCalculation
    ) {
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->accountRepository->getAll();
    }

    public function getAllWithBalance(): CollectionSupport
    {
        $accounts = $this->getAll();
        return $accounts->map(function($account) {
            return [
                'account' => $account,
                'balanceWithDefaultCurrency' => $this->balanceCalculation->getBalanceWithDefaultCurrency($account)
            ];
        });
    }

    /**
     * @return array
     */
    public function getAllCurrencies(): array
    {
        $result = [];

        $currencies = Currency::all();
        /* @var Currency $currency */
        foreach ($currencies as $currency) {
            $result[$currency->id] = $currency->code . ' - ' . $currency->name;
        }

        return $result;
    }

    /**
     * @return array
     */
    public function getAllTypes(): array
    {
        return AccountType::toArray();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data): mixed
    {
        return $this->accountRepository->create($data);
    }

    public function update(int $id, array $data): mixed
    {
        return $this->accountRepository->update($id, $data);
    }
}
