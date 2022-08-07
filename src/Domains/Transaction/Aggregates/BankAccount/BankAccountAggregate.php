<?php

declare(strict_types=1);

namespace Domains\Transaction\Aggregates\BankAccount;

use Spatie\EventSourcing\AggregateRoots\AggregateRoot;
use Domains\Transaction\Events\BankAccount\AccountCreated;
use Domains\Transaction\Events\BankAccount\MoneyTransferred;

class BankAccountAggregate extends AggregateRoot
{
    protected int $balance = 0;

    public function transfertMoney(int $amount): self
    {
        $this->recordThat(new MoneyTransferred($amount));

        if ($this->balance >= 10000) dump('Whoaw you are rich!');

        return $this;
    }

    public function applyMoneyTransferred(MoneyTransferred $event)
    {
        $this->balance += $event->amount;
    }

    public function createAccount(int $userId): self
    {
        $this->recordThat(new AccountCreated($userId));

        return $this;
    }
}