<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProductSaleRequest;
use App\Services\ProductSaleService;
use App\DTO\ProductSales\ProductSaleDTO;
use App\Http\Resources\ProductSaleResource;
use Illuminate\Http\Response;

class ProductSaleController extends Controller
{
    public function __construct(
        protected ProductSaleService $service
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product_sales = $this->service->getAll();

        return $product_sales;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateProductSaleRequest $request)
    {
        $product_sale = $this->service->new(ProductSaleDTO::makeFromRequest($request));

        return new ProductSaleResource($product_sale);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(!$product_sale = $this->service->getSingle($id)){
            return response()->json([
                'error' => 'Product from sale not found',
            ], Response::HTTP_NOT_FOUND);
        }
        
        return new ProductSaleResource($product_sale);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateProductSaleRequest $request, string $id)
    {
        $product_sale = $this->service->update(ProductSaleDTO::makeFromRequest($request, $id));

        if (!$product_sale) {
            return response()->json([
                'error' => 'Sale not found',
            ], Response::HTTP_NOT_FOUND);
        }

        return new ProductSaleResource($product_sale);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!$this->service->getSingle($id)) {
            return response()->json([
                'error' => 'Product from sale not found',
            ], Response::HTTP_NOT_FOUND);
        }

        $this->service->delete($id);

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
