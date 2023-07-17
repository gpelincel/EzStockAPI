<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\DTO\Products\ProductDTO;
use App\Http\Requests\StoreUpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;

class ProductController extends Controller
{
    public function __construct(
        protected ProductService $service
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->service->getAll();

        return $products;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateProductRequest $request)
    {
        $product = $this->service->new(ProductDTO::makeFromRequest($request));

        return new ProductResource($product);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(!$product = $this->service->getSingle($id)){
            return response()->json([
                'error' => 'Product not found',
            ], Response::HTTP_NOT_FOUND);
        }
        
        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateProductRequest $request, string $id)
    {
        $product = $this->service->update(ProductDTO::makeFromRequest($request, $id));

        if (!$product) {
            return response()->json([
                'error' => 'Product not found',
            ], Response::HTTP_NOT_FOUND);
        }

        return new ProductResource($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!$this->service->getSingle($id)) {
            return response()->json([
                'error' => 'Product not found',
            ], Response::HTTP_NOT_FOUND);
        }

        $this->service->delete($id);

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
