<?php

declare(strict_types=1);

namespace Domains\Transaction\Factories\BankAccount;

use Domains\Transaction\ValueObjects\BankAccount\TransfertMoneyValueObject;

class TransfertMoneyFactory
{
    public static function make(array $attributes): TransfertMoneyValueObject
    {
        return new TransfertMoneyValueObject(
            data_get($attributes, 'amount'),
        );
    }
}