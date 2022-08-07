<?php

declare(strict_types=1);

namespace Domains\Transaction\ValueObjects\BankAccount;

final class TransfertMoneyValueObject
{
    public function __construct(
        private readonly int $amount
    )
    {
        
    }

    public function toArray(): array
    {
        return [
            'amount' => $this->amount,
        ];
    }
}
