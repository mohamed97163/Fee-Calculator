<?php

namespace App\Services;

use App\Models\FeePreset;
use App\Models\Service;
use App\Models\Threshold;
use App\Repositories\Interface\IFeePercentage;


class FeePercentageService
{
    private IFeePercentage $feePercentage;
    public function __construct(IFeePercentage $feePercentage)
    {
        $this->feePercentage = $feePercentage;
    }

    public function index($limit)
    {
        return $this->feePercentage->getAllFeePercentages($limit);
    }
    public function store($request): void
    {
        $feePreset = FeePreset::where('id' , $request->fee_preset_id)->first();
        $service = Service::where('id' , $request->service_id)->first();
        $threshold = Threshold::where('id' , $request->threshold_id)->first();
        $feePercentage = $feePreset->percent + $service->percent + $threshold->percent;
        $feePercentage = [
            "fee_preset_id" => $request->fee_preset_id,
            "service_id" => $request->service_id,
            "threshold_id" => $request->threshold_id,
            "percentage" => $feePercentage
        ];

        $this->feePercentage->save($feePercentage); 
    }

    public function find($feePercentage)
    {
        return $this->feePercentage->findfeePercentage($feePercentage->id);
    }

    public function update($request, $feePercentage)
    {
        $feePercentage = $this->feePercentage->findfeePercentage($feePercentage->id);
        $feePercentage->fee_preset_id = $request->fee_preset_id ?? $feePercentage->fee_preset_id;
        $feePercentage->service_id = $request->service_id ?? $feePercentage->service_id;
        $feePercentage->threshold_id = $request->threshold_id ?? $feePercentage->threshold_id;
        $feePercentage->percentage = $request->percentage ?? $feePercentage->percentage;
        $this->feePercentage->update($feePercentage);
        return $feePercentage;
    }
    public function delete($feePercentage)
    {
        return $this->feePercentage->delete($feePercentage);
    }

}
