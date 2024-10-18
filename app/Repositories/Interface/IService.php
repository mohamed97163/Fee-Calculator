<?php

namespace App\Repositories\Interface;

interface IService
{
    public function getAllServices($limit = 10);
    public function findService($id);
    public function save($model);
    public function update($model);
    public function delete($model);
}