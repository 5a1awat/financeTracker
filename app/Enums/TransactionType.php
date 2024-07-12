<?php

declare(strict_types=1);

namespace App\Enums;

enum TransactionType: string
{
    case income = 'income';
    case expense = 'expense';
    case transfer = 'transfer';
    case exchange = 'exchange';
    case correction = 'correction';

    public static function toArray(): array
    {
        return [
            self::expense->value => 'Expense',
            self::income->value => 'Income',
            self::transfer->value => 'Transfer',
            self::exchange->value => 'Exchange',
            self::correction->value => 'Correction',
        ];
    }
}
