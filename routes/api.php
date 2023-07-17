<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BrandController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResources([
    'products' => ProductController::class,
    'suppliers' => SupplierController::class,
    'brands' => BrandController::class,
]);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });