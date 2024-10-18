<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreThresholdRequest;
use App\Models\Thresholds;
use App\Http\Requests\StoreThresholdsRequest;
use App\Http\Requests\UpdateThresholdRequest;
use App\Http\Requests\UpdateThresholdsRequest;
use App\Models\Threshold;
use App\Services\ThresholdService;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class ThresholdController extends Controller
{
    use ResponseTrait;
    private ThresholdService $thresholdService;
    public function __construct(ThresholdService $thresholdService)
    {
        $this->thresholdService = $thresholdService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $this->returnData(__("messages.All Thresholds"),200,$this->thresholdService->index($request->get("per_page",10)));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreThresholdRequest $request)
    {
        $this->thresholdService->store($request);
        return $this->success(__("messages.Threshold Created"),201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Threshold $threshold)
    {
        return $this->returnData(__("messages.Threshold Found"),200,$this->thresholdService->find($threshold));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateThresholdRequest $request, Threshold $threshold)
    {
        return $this->returnData(__("messages.Threshold Updated"),200,$this->thresholdService->update($request,$threshold));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Threshold $threshold)
    {
        $this->thresholdService->delete($threshold);
        return $this->success(__("messages.Threshold Deleted"),200);
    }
}
