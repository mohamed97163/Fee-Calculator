<?php

namespace App\Repositories\Interface;

interface IFeePreset
{
    public function getAllFeePresets($limit = 10);
    public function findPreset($id);
    public function save($model);
    public function update($model);
    public function delete($model);
}