<?php

namespace App\Http\Controllers\Transaction\BankAccount;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Domains\Transaction\Actions\BankAccount\TransferMoneyAction;
use Domains\Transaction\ValueObjects\BankAccount\BankAccountValueObject;

class MoneyTransferredController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $bankAccount = auth()->user()->bankAccounts->first();
        $amount = new BankAccountValueObject(10);

        TransferMoneyAction::handle(
            $bankAccount,
            $amount
        );

        dump($bankAccount->balance);
    }
}
