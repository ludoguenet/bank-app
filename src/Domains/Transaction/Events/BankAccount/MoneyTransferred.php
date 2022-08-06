<?php

declare(strict_types=1);

namespace Domains\Transaction\Events\BankAccount;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class MoneyTransferred extends ShouldBeStored
{
    public function __construct(
        public string $uuid,
        public int $amount,
    )
    {
    }
}