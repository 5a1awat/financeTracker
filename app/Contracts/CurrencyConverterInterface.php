<?php

declare(strict_types=1);

namespace App\Contracts;

interface CurrencyConverterInterface
{
    public function getExchange(string $baseCurrency, string $targetCurrency, float $amount);
    public function getExchangeRate(string $baseCurrency, string $targetCurrency);
}
