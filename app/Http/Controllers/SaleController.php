<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateSaleRequest;
use App\Services\SaleService;
use App\DTO\Sales\SaleDTO;
use App\Http\Resources\SaleResource;
use Illuminate\Http\Response;

class SaleController extends Controller
{
    public function __construct(
        protected SaleService $service
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = $this->service->getAll();

        return $sales;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateSaleRequest $request)
    {
        $sale = $this->service->new(SaleDTO::makeFromRequest($request));

        return new SaleResource($sale);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(!$sale = $this->service->getSingle($id)){
            return response()->json([
                'error' => 'Sale not found',
            ], Response::HTTP_NOT_FOUND);
        }
        
        return new SaleResource($sale);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateSaleRequest $request, string $id)
    {
        $sale = $this->service->update(SaleDTO::makeFromRequest($request, $id));

        if (!$sale) {
            return response()->json([
                'error' => 'Sale not found',
            ], Response::HTTP_NOT_FOUND);
        }

        return new SaleResource($sale);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!$this->service->getSingle($id)) {
            return response()->json([
                'error' => 'Sale not found',
            ], Response::HTTP_NOT_FOUND);
        }

        $this->service->delete($id);

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
