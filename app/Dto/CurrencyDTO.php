<?php

declare(strict_types=1);

namespace App\Dto;

class CurrencyDTO
{
    private string $name;
    private string $code;
    private string $symbol;
    private int $number;

    public function __construct(string $name, string $code, string $symbol, int $number)
    {
        $this->name = $name;
        $this->code = $code;
        $this->symbol = $symbol;
        $this->number = $number;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'],
            $data['code'],
            $data['symbol'],
            $data['number']
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->getName(),
            'code' => $this->getCode(),
            'symbol' => $this->getSymbol(),
            'number' => $this->getNumber(),
        ];
    }
}
