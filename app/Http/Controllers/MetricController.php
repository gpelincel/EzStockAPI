<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Http\Requests\StoreUpdateMetricRequest;
use App\Http\Resources\MetricResource;
use App\Services\MetricService;
use stdClass;

class MetricController extends Controller
{
    public function __construct(
        protected MetricService $service
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $metrics = $this->service->getAll();

        return $metrics;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateMetricRequest $request)
    {
        $metric = $this->service->new($request->all());

        return new MetricResource($metric);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(!$metric = $this->service->getSingle($id)){
            return response()->json([
                'error' => 'Metric not found',
            ], Response::HTTP_NOT_FOUND);
        }
        
        return new MetricResource($metric);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateMetricRequest $request, string $id)
    {
        $metric = $this->service->update($id, $request->all());

        if (!$metric) {
            return response()->json([
                'error' => 'Metric not found',
            ], Response::HTTP_NOT_FOUND);
        }

        return new MetricResource($metric);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!$this->service->getSingle($id)) {
            return response()->json([
                'error' => 'Metric not found',
            ], Response::HTTP_NOT_FOUND);
        }

        $this->service->delete($id);

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
