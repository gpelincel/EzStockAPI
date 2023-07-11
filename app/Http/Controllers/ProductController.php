<?php

namespace App\Http\Controllers;

use App\DTO\Products\ProductDTO;
use App\Http\Requests\StoreUpdateProductRequest;
use App\Services\ProductService;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function __construct(
        protected ProductService $service
    ){}

    public function index(){
        $products = $this->service->getAll();

        return $products;
    }

    public function store(StoreUpdateProductRequest $request){
        $product = $this->service->new(ProductDTO::makeFromRequest($request));

        return $product;
    }

    public function show(string $id){
        if(!$product = $this->service->getSingle($id)){
            return response()->json([
                'error' => 'Product not found',
            ], Response::HTTP_NOT_FOUND);
        }
        
        return $product;
    }

    public function update(StoreUpdateProductRequest $request, string $id){
        $product = $this->service->update(ProductDTO::makeFromRequest($request, $id));

        if (!$product) {
            return response()->json([
                'error' => 'Product not found',
            ], Response::HTTP_NOT_FOUND);
        }

        return new $product;
    }

    public function destroy(string $id){
        if (!$this->service->getSingle($id)) {
            return response()->json([
                'error' => 'Product not found',
            ], Response::HTTP_NOT_FOUND);
        }

        $this->service->delete($id);

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
