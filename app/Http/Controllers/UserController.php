<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function store(StoreUserRequest $request)
    {
        $user = $request->validated();
        
        return User::create($user);
    }

    public function show(User $user)
    {
        return $user;
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user = request->validated();
        return $user;
    }

    public function destroy(User $user)
    {
        $response = $user->delete();
    
        return response()->json([
            'content' => '',
            'response' => $response,
        ], $response ? 204 : 500);
    }
}
