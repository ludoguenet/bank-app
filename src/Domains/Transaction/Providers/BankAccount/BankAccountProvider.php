<?php

declare(strict_types=1);

namespace Domains\Transaction\Providers\BankAccount;

use Domains\Transaction\Projectors\BankAccount\BankAccountProjector;
use Illuminate\Support\ServiceProvider;
use Spatie\EventSourcing\Facades\Projectionist;

class BankAccountProvider extends ServiceProvider
{
    public function register(): void
    {
        Projectionist::addProjector(BankAccountProjector::class);
    }
}
