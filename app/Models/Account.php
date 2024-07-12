<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string $name
 * @property string $type
 * @property float $balance_start
 * @property string $comment
 *
 * @property Currency $currency
 */
class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'currency_id',
        'balance_start',
        'comment',
    ];

    /**
     * @return BelongsTo
     */
    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }


    public function balance(): float
    {
        return (float) $this->balance_start - $this->transactions()->sum('amount');
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
