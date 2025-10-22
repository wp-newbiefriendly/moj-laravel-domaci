<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetRealCurrency extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get-real-currency';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
      $response = Http::get('https://kurs.resenje.org/api/v1/currencies/eur/rates/today'); // Domaci API bez autentifikacije test

    //  $response = Http::get(env('REAL_CURRENCY_API_URL')); // Iz ENV fajla

//        $response = Http::get('https://api.freecurrencyapi.com/v1/latest?apikey=fca_live_D081BnRtbOXZZi6hgVsVggrpwLlJTZc5awSX47Uh&currencies=EUR%2CUSD%2CCAD&base_currency=EUR');

        dd($response->json()['exchange_middle']);
    }
}
