<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Exception;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * @throws Exception
     */
    public function login(LoginRequest $request): JsonResponse
    {
        return $this->returnData(__("messages.Logged In Successfully"), 200,$this->authService->login($request));
    }

    public function logout(): JsonResponse
    {
        $this->authService->logout();
        return $this->success(__("messages.Logged Out Successfully"), 204);
    }

}
