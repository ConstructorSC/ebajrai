<?php

namespace App\Providers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class ProductServiceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Product::class, function ($app) {
            return new Product();
        });

        $this->app->bind(DB::class, function ($app) {
            return new DB();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
