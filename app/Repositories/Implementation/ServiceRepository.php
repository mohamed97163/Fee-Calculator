<?php

namespace App\Repositories\Implementation;

use App\Models\Service;
use App\Repositories\Interface\IService;

class ServiceRepository implements IService
{

    public function getAllServices($limit = 10)
    {
        return Service::paginate($limit);
    }

    public function findService($id)
    {
        return Service::findOrFail($id);
    }

    public function save($model)
    {
        return Service::create($model);
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
