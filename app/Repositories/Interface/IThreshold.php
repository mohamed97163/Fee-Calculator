<?php

namespace App\Repositories\Interface;

interface IThreshold
{
    public function getAllThresholds($limit = 10);
    public function findThreshold($id);
    public function save($model);
    public function update($model);
    public function delete($model);
}