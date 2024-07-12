<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\AccountRepositoryInterface;
use App\Models\Account;

class BalanceCalculation
{
    public function __construct(
        protected AccountRepositoryInterface $accountRepository,
        protected CurrencyConverter $currencyConverter
    ) {
    }

    public function getTotalBalance(): float
    {
        $accounts = $this->accountRepository->getAll();
        return $accounts->sum(function($account) {
            return $this->getBalanceWithDefaultCurrency($account);
        });
    }

    public function getBalanceWithDefaultCurrency(Account $account): float
    {
        $defaultCurrency = config('currency.default');;
        if ($account->currency->code === $defaultCurrency) {
            return $account->balance();
        }

        return $this->currencyConverter->getExchange($account->currency->code, $defaultCurrency, $account->balance());
    }
}
