<?php

declare(strict_types=1);

namespace Domains\Transaction\Actions\BankAccount;

use App\Models\BankAccount;
use Domains\Transaction\ValueObjects\BankAccount\BankAccountValueObject;

class TransferMoneyAction
{
    public static function handle(
        BankAccount $bankAccount,
        BankAccountValueObject $valueObject
    ): void {
        $bankAccount->transferMoney(
            data_get($valueObject->toArray(), 'amount')
        );
    }
}
