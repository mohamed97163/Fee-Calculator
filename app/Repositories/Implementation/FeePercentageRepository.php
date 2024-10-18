<?php

namespace App\Repositories\Implementation;

use App\Models\FeePercentage;
use App\Repositories\Interface\IFeePercentage;

class FeePercentageRepository implements IFeePercentage
{

    public function getAllFeePercentages($limit = 10)
    {
        return FeePercentage::paginate($limit);
    }

    public function findFeePercentage($id)
    {
        return FeePercentage::findOrFail($id);
    }

    public function save($model)
    {
        return FeePercentage::create($model);
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
