<?php

namespace App\Repositories\Implementation;

use App\Models\User;
use App\Repositories\Interface\IUser;

class UserRepository implements IUser
{

    public function getAllUsers($limit = 10)
    {
        return User::paginate($limit);
    }

    public function findUserById($id)
    {
        return User::findOrFail($id);
    }
    public function findUserByEmail($email)
    {
        $user = User::where('email', $email)->with("role")->first();
        if(!$user){
            $user = User::where('phone_number', $email)->with("role")->first();
        }
        return $user;

    }

    public function save($model)
    {
        return User::create($model);
    }

    public function update($user)
    {
        return $user->save();
    }

    public function delete($user)
    {
        return $user->delete();
    }
}
