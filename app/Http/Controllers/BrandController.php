<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Http\Requests\StoreUpdateBrandRequest;
use App\Http\Resources\BrandResource;
use App\Services\BrandService;
use stdClass;

class BrandController extends Controller
{
    public function __construct(
        protected BrandService $service
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = $this->service->getAll();

        return $brands;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateBrandRequest $request)
    {
        $brand = $this->service->new($request->all());

        return new BrandResource($brand);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(!$brand = $this->service->getSingle($id)){
            return response()->json([
                'error' => 'Brand not found',
            ], Response::HTTP_NOT_FOUND);
        }
        
        return new BrandResource($brand);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateBrandRequest $request, string $id)
    {
        $brand = $this->service->update($id, $request->all());

        if (!$brand) {
            return response()->json([
                'error' => 'Product not found',
            ], Response::HTTP_NOT_FOUND);
        }

        return new BrandResource($brand);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!$this->service->getSingle($id)) {
            return response()->json([
                'error' => 'Brand not found',
            ], Response::HTTP_NOT_FOUND);
        }

        $this->service->delete($id);

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
