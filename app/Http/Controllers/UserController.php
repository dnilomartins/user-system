<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;

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
        $user = $request->validated();
        return $user;
    }

    public function destroy(User $user)
    {
        $response = $user->delete();

        return response()->json([
            'message' => $response ? 'Usuário deletado com sucesso!' : 'Erro ao deletar usuário!',
        ], $response ? 204 : 500);
    }
}
