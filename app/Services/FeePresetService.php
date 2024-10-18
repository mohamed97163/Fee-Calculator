<?php

namespace App\Services;

use App\Repositories\Interface\IFeePreset;

class FeePresetService
{
    private IFeePreset $feePreset;
    public function __construct(IFeePreset $feePreset)
    {
        $this->feePreset = $feePreset;
    }

    public function index($limit)
    {
        return $this->feePreset->getAllfeePresets($limit);
    }
    public function store($request): void
    {
        $feePreset = [
            "name" => $request->name,
            "percent" => $request->percent
        ];
        $this->feePreset->save($feePreset);
    }

    public function find($feePreset)
    {
        return $this->feePreset->findPreset($feePreset->id);
    }

    public function update($request, $feePreset)
    {
        $feePreset = $this->feePreset->findPreset($feePreset->id);
        $feePreset->name = $request->name ?? $feePreset->name;
        $feePreset->percent = $request->percent ?? $feePreset->percent;
        $this->feePreset->update($feePreset);
        return $feePreset;
    }
    public function delete($feePreset)
    {
        return $this->feePreset->delete($feePreset);
    }

}
