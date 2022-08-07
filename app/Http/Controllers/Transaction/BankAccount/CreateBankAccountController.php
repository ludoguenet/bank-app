<?php

namespace App\Http\Controllers\Transaction\BankAccount;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use Domains\Transaction\Aggregates\BankAccount\BankAccountAggregate;

class CreateBankAccountController extends Controller
{
    public function __invoke(Request $request)
    {
        BankAccountAggregate::retrieve(
            Str::uuid()
        )
            ->createAccount(
                auth()->user()->id
            )
            ->persist();

        // BankAccount::create([
        //     'user_id' => auth()->user()->id,
        // ]);
    }
}
