<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExchangeRates extends Model
{
    use HasFactory;

    const CURRENCY_USD = 'usd';
    const CURRENCY_EUR = 'eur';
    const AVAILABLE_CURRENCY = [
        self::CURRENCY_USD, self::CURRENCY_EUR,
    ];

    protected $table = 'exchange_rates';

    protected $fillable = ['currency', 'value'];

    public static function getCurrencyForToday($currency) {
        return self::where('currency', $currency)
            ->whereDate('created_at', Carbon::now())
            ->first();
    }
}
