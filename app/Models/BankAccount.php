<?php

declare(strict_types=1);

namespace App\Models;

use App\Concerns\HasUuid;
use Domains\Transaction\Events\BankAccount\MoneyTransferred;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BankAccount extends Model
{
    use HasFactory;
    // use HasUuid;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'balance',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function transferMoney(int $amount): void
    {
        event(new MoneyTransferred(
            $this->uuid,
            $amount
        ));
    }
}
