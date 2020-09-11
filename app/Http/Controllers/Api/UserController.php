<?php

namespace App\Http\Controllers\Api;

use App\Events\UserRegistered;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStore;
use App\Http\Requests\UserUpdate;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->filled('perPage') ? $request->perPage : 15;
        $user = User::paginate($perPage);
        return new UserResource($user);
    }

    public function store(UserStore $request)
    {
        $user = User::create($request->all());
        event(new UserRegistered($user));
        return \response()->json(['message' => 'User created', 'data' => $user], 200);
    }

    public function me()
    {
        return new UserResource(auth()->user()->toArray());
    }

    public function update(UserUpdate $request, User $user)
    {
        if ($request->email !== $user->email) {
            if (User::where('email', $request->email)->first()) {
                return \response()->json(['errors' => ['A email is unique']], 400);
            }
        }
        $user->update($request->all());
        return response()->json(['message' => 'User updated', 'data' => $user], 200);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return ['message' => 'User deleted'];
    }

    public function forceDestroy($id)
    {
        User::where('id', $id)->forceDelete();
        return ['message' => 'User force deleted'];
    }
}
