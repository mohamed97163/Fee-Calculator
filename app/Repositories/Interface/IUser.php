<?php

namespace App\Repositories\Interface;

interface IUser
{
    public function getAllUsers($limit = 10);
    public function findUserById($id);
    public function findUserByEmail($email);
    public function save($model);
    public function update($user);
    public function delete($user);
}
