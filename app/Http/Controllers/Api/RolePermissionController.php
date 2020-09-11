<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionStore;
use App\Http\Requests\RoleUser;
use App\User;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $role = RolePermission::all();
        // return new RolePermissionResource($role);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    public function assignRole(RoleUser $request)
    {
        $user = User::find($request->users_id);
        $user->assignRole($request->name);
        return \response()->json(['message' => 'Assign role success', 'data' => $user], 200);
    }

    public function removeRole(RoleUser $request)
    {
        $user = User::find($request->users_id);
        $user->removeRole($request->name);
        return \response()->json(['message' => 'Remove role success', 'data' => $user], 200);
    }

    public function syncRoles(RoleUser $request)
    {
        $user = User::find($request->users_id);
        $user->syncRoles($request->name);
    }

    public function givePermissionTo(PermissionStore $request)
    {
        $role->syncRoles($request->name);
    }
}
