<?php

namespace App\Services;

use App\Repositories\Interface\IThreshold;

class ThresholdService
{
    private IThreshold $threshold;
    public function __construct(IThreshold $threshold)
    {
        $this->threshold = $threshold;
    }

    public function index($limit)
    {
        return $this->threshold->getAllThresholds($limit);
    }
    public function store($request): void
    {
        $threshold = [
            "min_amount" => $request->min_amount,
            "max_amount" => $request->max_amount,
            "percent" => $request->percent
        ];
        $this->threshold->save($threshold);
    }

    public function find($threshold)
    {
        return $this->threshold->findThreshold($threshold->id);
    }

    public function update($request, $threshold)
    {
        $threshold = $this->threshold->findThreshold($threshold->id);
        $threshold->min_amount = $request->min_amount ?? $threshold->min_amount;
        $threshold->max_amount = $request->max_amount ?? $threshold->max_amount;
        $threshold->percent = $request->percent ?? $threshold->percent;
        $this->threshold->update($threshold);
        return $threshold;
    }
    public function delete($threshold)
    {
        return $this->threshold->delete($threshold);
    }

}
