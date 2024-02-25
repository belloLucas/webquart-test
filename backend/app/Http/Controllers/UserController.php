<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
            'password' => 'required|string',
            'profile_picture' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string'
        ]);

        $user = User::create($validatedData);
        return response()->json($user, 201);
    }

    public function show(User $user)
    {
        return response()->json($user);
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'string',
            'email' => 'string',
            'phone' => 'string',
            'password' => 'string',
            'profile_picture' => 'string',
            'city' => 'string',
            'state' => 'string'
        ]);

        $user->update($validatedData);
        return response()->json($user, 200);
    }

    public function delete(User $user)
    {
        $user->delete();
        return response()->json(null, 204);
    }

}
