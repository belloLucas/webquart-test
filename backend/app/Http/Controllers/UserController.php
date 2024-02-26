<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return $this->userService->findAllUsers();
    }

    public function store(Request $request)
    {
        return $this->userService->createUser($request);
    }

    public function show(User $user)
    {
        return $this->userService->showUser($user);
    }

    public function update(Request $request, User $user)
    {
        return $this->userService->updateUser($request, $user);
    }

    public function delete(User $user)
    {
        return $this->userService->deleteUser($user);
    }

}
