<?php

namespace App\Providers;

use App\Helpers\Services\LocationBuilder;
use App\Helpers\Services\LocationServiceInterface;
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
        $this->app->bind(LocationServiceInterface::class, LocationBuilder::class);
    }
}
