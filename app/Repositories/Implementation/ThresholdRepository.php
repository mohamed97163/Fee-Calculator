<?php

namespace App\Repositories\Implementation;

use App\Models\Threshold;
use App\Repositories\Interface\IThreshold;

class ThresholdRepository implements IThreshold
{

    public function getAllThresholds($limit = 10)
    {
        return Threshold::paginate($limit);
    }

    public function findThreshold($id)
    {
        return Threshold::findOrFail($id);
    }

    public function save($model)
    {
        return Threshold::create($model);
    }

    public function update($model)
    {
        return $model->save();
    }

    public function delete($model)
    {
        return $model->delete();
    }
}
