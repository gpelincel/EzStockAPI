<?php

namespace App\Providers;

use App\Models\Supplier;
use App\Repositories\Product\ProductEloquentORM;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Supplier\SupplierEloquentORM;
use App\Repositories\Supplier\SupplierRepositoryInterface;
use App\Repositories\Brand\BrandEloquentORM;
use App\Repositories\Brand\BrandRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProductRepositoryInterface::class, ProductEloquentORM::class);
        $this->app->bind(SupplierRepositoryInterface::class, SupplierEloquentORM::class);
        $this->app->bind(BrandRepositoryInterface::class, BrandEloquentORM::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
