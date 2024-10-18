<?php

namespace App\Services;

use App\Repositories\Interface\IUser;
use Exception;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    private IUser $user;
    public function __construct(IUser $user)
    {
        $this->user = $user;
    }

    /**
     * @throws Exception
     */
    public function login($request)
    {
        $user = $this->user->findUserByEmail($request->emailOrMobile);
        if ($user && Hash::check($request->password, $user->password)) {
            $token = $user->createToken($user->password);
            $user->token = $token->plainTextToken;
            return $user;
        }
        throw new \Exception(__('messages.Failed Login'));
    }
    public function register($request)
    {
        //todo it will be not a register function from the system
        // if anyone want to get the system it must registered by any one from the admins
    }

    public function logout(): void
    {
        auth()->user()->tokens()->delete();
    }

}
