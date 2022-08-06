<?php

declare(strict_types=1);

namespace App\Concerns;

use Illuminate\Support\Str;

trait HasUuid
{
    public static function bootHasUuid(): void
    {
        static::saving(fn ($model) => $model->uuid = (string) Str::uuid());
    }
}