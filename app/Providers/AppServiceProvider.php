<?php

namespace App\Providers;

use App\Services\CarInterface;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Services\UserServices\CarService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // fix specified key is too long
        Schema::defaultStringLength(191);

        // bind interfaces
        $this->app->bind(CarInterface::class, CarService::class);
    }
}
