<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\CurrencyConverterInterface;
use App\Dto\ExchangeRateDTO;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class CurrencyConverter implements CurrencyConverterInterface
{
    protected Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://open.er-api.com/v6/',
        ]);
    }

    public function getExchange(string $baseCurrency, string $targetCurrency, float $amount): float
    {
        $rate = $this->getExchangeRate($baseCurrency, $targetCurrency);
        return round($amount * $rate->getExchangeRate(), 2);
    }

    /**
     * @throws GuzzleException
     * @throws Exception
     */
    public function getExchangeRate(string $baseCurrency, string $targetCurrency): ExchangeRateDTO
    {
        try {
            $response = $this->client->request('GET', "latest/{$baseCurrency}");
            $data = json_decode((string) $response->getBody(), true);

            if (!isset($data['rates'])) {
                throw new Exception('Error getting currency rates from API response');
            }

            return new ExchangeRateDTO($baseCurrency, $targetCurrency, $data['rates'][$targetCurrency]);
        } catch (Exception $e) {
            throw new Exception('Error while retrieving data from API ' . $e->getMessage());
        }
    }
}
