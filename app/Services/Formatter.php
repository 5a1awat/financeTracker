<?php

declare(strict_types=1);

namespace App\Services;

class Formatter
{
    public static function getBalance(float $balance, string $code): string
    {
        return number_format((float) $balance, 2, '.', ' ') . ' ' . $code;
    }
}
