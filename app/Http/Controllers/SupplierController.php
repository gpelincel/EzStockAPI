<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Http\Requests\StoreUpdateSupplierRequest;
use App\Http\Resources\SupplierResource;
use App\Services\SupplierService;
use App\DTO\Suppliers\SupplierDTO;

class SupplierController extends Controller
{
    public function __construct(
        protected SupplierService $service
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = $this->service->getAll();

        return $suppliers;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateSupplierRequest $request)
    {
        $supplier = $this->service->new(SupplierDTO::makeFromRequest($request));

        return new SupplierResource($supplier);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(!$supplier = $this->service->getSingle($id)){
            return response()->json([
                'error' => 'Supplier not found',
            ], Response::HTTP_NOT_FOUND);
        }
        
        return new SupplierResource($supplier);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateSupplierRequest $request, string $id)
    {
        $supplier = $this->service->update(SupplierDTO::makeFromRequest($request, $id));

        if (!$supplier) {
            return response()->json([
                'error' => 'Supplier not found',
            ], Response::HTTP_NOT_FOUND);
        }

        return new SupplierResource($supplier);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!$this->service->getSingle($id)) {
            return response()->json([
                'error' => 'Supplier not found',
            ], Response::HTTP_NOT_FOUND);
        }

        $this->service->delete($id);

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
