<?php

namespace App\Http\Controllers\Transaction\BankAccount;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Domains\Transaction\Actions\BankAccount\TransferMoneyAction;
use Domains\Transaction\Aggregates\BankAccount\BankAccountAggregate;
use Domains\Transaction\Factories\BankAccount\TransfertMoneyFactory;

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

        $aggregateRoot = BankAccountAggregate::retrieve($bankAccount->uuid);

        $aggregateRoot
            ->transfertMoney(1000)
            ->persist();

        // TransferMoneyAction::handle(
        //     $bankAccount,
        //     TransfertMoneyFactory::make(['amount' => 10]),
        // );

        dump($bankAccount->refresh()->balance);
    }
}
