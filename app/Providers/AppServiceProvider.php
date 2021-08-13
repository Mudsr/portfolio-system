<?php

namespace App\Providers;

use App\Models\Portfolio;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // $portfolio = Portfolio::getCurrentPortfolio();
        // $portfolios = Portfolio::all();
        // View::share('currentPortfolio',$portfolio);
        // View::share('portfolios',$portfolios);
    }
}
