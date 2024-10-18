<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $this->returnData(__("messages.Managers Found"),200,$this->userService->index($request->get("per_page",10)));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $this->userService->store($request);
        return $this->success(__("messages.Manager Created"),200);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return $this->returnData(__("messages.Manager Found"),200,$this->userService->find($user));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->userService->update($request,$user);
        return $this->success(__("messages.Manager Updated"),200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $this->userService->delete($user);
        return $this->success(__("messages.Manager Deleted"),200);
    }
}
