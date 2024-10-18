<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFeePresetRequest;
use App\Http\Requests\UpdateFeePresetRequest;
use App\Models\FeePreset;
use App\Services\FeePresetService;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class FeePresetController extends Controller
{
    use ResponseTrait;
    private FeePresetService $feePresetService;
    public function __construct(FeePresetService $feePresetService)
    {
        $this->feePresetService = $feePresetService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $this->returnData(__("messages.All FeePresets"),200,$this->feePresetService->index($request->get("per_page",10)));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFeePresetRequest $request)
    {
        $this->feePresetService->store($request); 
        return $this->success(__("messages.FeePreset Created"),201);
    }

    /**
     * Display the specified resource.
     */
    public function show(FeePreset $feePreset)
    {
        return $this->returnData(__("messages.FeePreset Found"),200,$this->feePresetService->find($feePreset));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFeePresetRequest $request, FeePreset $feePreset)
    {
        return $this->returnData(__("messages.FeePreset Updated"),200,$this->feePresetService->update($request,$feePreset));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeePreset $feePreset)
    {
        $this->feePresetService->delete($feePreset);
        return $this->success(__("messages.FeePreset Deleted"),200);
    }
}
