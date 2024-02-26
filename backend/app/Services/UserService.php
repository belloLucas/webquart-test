<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function findAllUsers()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function createUser($request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::create($validatedData);
        return response()->json($user, 201);
    }

    public function showUser($user)
    {
        return response()->json($user);
    }

    public function updateUser($request, $user)
    {
        $validatedData = $request->validate([
            'email' => 'string',
        ]);

        $user->update($validatedData);
        return response()->json($user, 200);
    }

    public function deleteUser($user)
    {
        $user->delete();
        return response()->json(null, 204);
    }
}
