<?php

namespace App\Repositories\Implementation;

use App\Models\FeePreset;
use App\Repositories\Interface\IFeePreset as InterfaceIFeePreset;


class FeePresetRepository implements InterfaceIFeePreset
{

    public function getAllFeePresets($limit = 10)
    {
        return FeePreset::paginate($limit);
    }

    public function findpreset($id)
    {
        return FeePreset::findOrFail($id);
    }

    public function save($model)
    {
        return FeePreset::create($model);
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
