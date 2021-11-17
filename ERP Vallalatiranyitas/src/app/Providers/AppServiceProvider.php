<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use ConsoleTVs\Charts\Registrar as Charts;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use App\Models\Szabadsagoks;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Charts $charts)
    {
        Paginator::useBootstrap();
        $charts->register([
            \App\Charts\SampleChart::class,
            \App\Charts\OsszesChart::class
        ]);
        $uj=Szabadsagoks::with('users')->where('biralat', '=', 0)->count();
        config(['uj' => $uj]);
    }
}
