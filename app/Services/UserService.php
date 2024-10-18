<?php

namespace App\Services;


use App\Repositories\Interface\IUser;
use App\Traits\CodeGenerator;
use Illuminate\Support\Facades\Hash;

class UserService
{
    use CodeGenerator;
    private IUser $user;
    public function __construct(IUser $user)
    {
        $this->user = $user;
    }

    public function index($limit)
    {
        return $this->user->getAllusers($limit);
    }

    public function store($request): void
    {
        $user = [
            "code" => $this->generateCode("users"),
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "phone_number" => $request->phone_number,
            "whatsapp_number" => $request->whatsapp_number,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "role_id" => 1, // Admin
        ];
        $this->user->save($user);
    }

    public function find($user)
    {
        return $this->user->finduserById($user->id);
    }

    public function update($request, $user)
    {
        $user = $this->user->finduserById($user->id);
        $user->first_name = $request->first_name ?? $user->first_name;
        $user->last_name = $request->last_name ?? $user->last_name;
        $user->phone_number = $request->phone_number ?? $user->phone_number;
        $user->whatsapp_number = $request->whatsapp_number ?? $user->whatsapp_number;
        $user->email = $request->email ?? $user->email;
        $user->password = Hash::make($request->password) ?? $user->password;
        $user->role_id = $request->role_id ?? $user->role_id;
        $this->user->update($user);
        return $user;
    }
    public function delete($user)
    {
        return $this->user->delete($user);
    }
}
