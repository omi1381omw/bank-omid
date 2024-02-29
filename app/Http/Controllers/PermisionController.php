<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionDeleteRequest;
use App\Http\Requests\PermissionStoreRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class PermisionController extends Controller
{

    public function show(Request $request, $id)
    {
        $user  = User::findOrFail($id);

        $roles = $user->roles;

        $rolesList = Role::all();

        return view('permisions.show', compact('user', 'roles', 'rolesList')); 
    }

    public function store(PermissionStoreRequest $request, $id)
    {

        $user  = User::findOrFail($id);

        $user->roles()->attach(['role_id' => $request->role_id]);

        return redirect('permisions/' . $user->id);
    }

    public function destroy(PermissionDeleteRequest $request, $id)
    {
        $user  = User::findOrFail($id);

        $user->roles()->detach(['role_id' => $request->role_id]);

        return redirect('permisions/' . $user->id);
    }

}
