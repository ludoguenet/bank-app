<?php

declare(strict_types=1);

namespace Domains\Transaction\Projectors\BankAccount;

use App\Models\BankAccount;
use Domains\Transaction\Events\BankAccount\MoneyTransferred;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class BankAccountProjector extends Projector
{
    public function onMoneyTransferred(MoneyTransferred $event): void
    {
        $bankAccount = BankAccount::whereUuid($event->uuid)->first();

        $bankAccount->balance += $event->amount;

        $bankAccount->save();
    }
}