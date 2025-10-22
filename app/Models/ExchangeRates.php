<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExchangeRates extends Model
{
    const CURRENCY_EUR = 'EUR';
    const CURRENCY_USD = 'USD';
    const CURRENCY_GBP = 'GBP';

    const CURRENCY_LIST = [
        self::CURRENCY_EUR,
        self::CURRENCY_USD,
        self::CURRENCY_GBP,
    ];
    protected $table = 'exchange_rates';

    protected $fillable = ['currency', 'value'];

    public static function getCurrency($currency)
    {
        return self::where('currency', $currency)
            ->whereDate('created_at', today())
            ->first();
    }

}
