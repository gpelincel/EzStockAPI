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
use App\Repositories\Metric\MetricEloquentORM;
use App\Repositories\Metric\MetricRepositoryInterface;
use App\Repositories\ProductSale\ProductSaleEloquentORM;
use App\Repositories\ProductSale\ProductSaleRepositoryInterface;
use App\Repositories\Sale\SaleRepositoryInterface;
use App\Repositories\Sale\SaleEloquentORM;

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
        $this->app->bind(SaleRepositoryInterface::class, SaleEloquentORM::class);
        $this->app->bind(ProductSaleRepositoryInterface::class, ProductSaleEloquentORM::class);
        $this->app->bind(MetricRepositoryInterface::class, MetricEloquentORM::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
