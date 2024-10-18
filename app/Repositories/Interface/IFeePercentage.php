<?php

namespace App\Repositories\Interface;

interface IFeePercentage
{
    public function getAllFeePercentages($limit = 10);
    public function findFeePercentage($id);
    public function save($model);
    public function update($model);
    public function delete($model);
}