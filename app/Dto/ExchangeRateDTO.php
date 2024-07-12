<?php

declare(strict_types=1);

namespace App\Dto;

class ExchangeRateDTO
{
    private string $baseCurrency;
    private string $targetCurrency;
    private float $exchangeRate;

    public function __construct(string $baseCurrency, string $targetCurrency, float $exchangeRate)
    {
        $this->baseCurrency = $baseCurrency;
        $this->targetCurrency = $targetCurrency;
        $this->exchangeRate = $exchangeRate;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['baseCurrency'],
            $data['targetCurrency'],
            $data['exchangeRate']
        );
    }

    public function getBaseCurrency(): string
    {
        return $this->baseCurrency;
    }

    public function getTargetCurrency(): string
    {
        return $this->targetCurrency;
    }

    public function getExchangeRate(): float
    {
        return $this->exchangeRate;
    }
}
