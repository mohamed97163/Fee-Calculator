<?php

namespace App\Http\Controllers;

use App\Models\FeePercentage;
use App\Http\Requests\StoreFeePercentageRequest;
use App\Http\Requests\UpdateFeePercentageRequest;
use App\Services\FeePercentageService;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;


class FeePercentageController extends Controller
{
    use ResponseTrait;
    private FeePercentageService $feePercentageService;
    public function __construct(FeePercentageService $feePercentageService)
    {
        $this->feePercentageService = $feePercentageService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $this->returnData(__("messages.All Clients"),200,$this->feePercentageService->index($request->get("per_page",10)));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFeePercentageRequest $request)
    {
        $this->feePercentageService->store($request);
        return $this->success(__("messages.Client Created"),201);
    }

    /**
     * Display the specified resource.
     */
    public function show(FeePercentage $feePercentage)
    {
        return $this->returnData(__("messages.Client Found"),200,$this->feePercentageService->find($feePercentage));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFeePercentageRequest $request, FeePercentage $feePercentage)
    {
        return $this->returnData(__("messages.Client Updated"),200,$this->feePercentageService->update($request,$feePercentage));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeePercentage $feePercentage)
    {
        $this->feePercentageService->delete($feePercentage);
        return $this->success(__("messages.Client Deleted"),200);
    }
}
