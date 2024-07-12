<?php

declare(strict_types=1);

namespace App\Enums;

enum AccountType: string
{
    case cash = 'cash';
    case card = 'card';
    case deposit = 'deposit';
    case loan = 'loan';

    /**
     * @return string[]
     */
    public static function toArray(): array
    {
        return [
            self::cash->value => 'Cash',
            self::card->value => 'Card',
            self::deposit->value => 'Deposit',
            self::loan->value => 'Loan',
        ];
    }
}
