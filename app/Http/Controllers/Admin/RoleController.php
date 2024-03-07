<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleStoreRequest;
use App\Http\Requests\Admin\RoleUpdateRequest;
use App\Models\Role;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $roles=Role::get();

        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(RoleStoreRequest $request)
    {
       Role::create($request->validated());

        return redirect('admin.roles');
    }

    public function edit(string $id)
    {
        $role  = Role::findOrFail($id);

        return view('admin.roles.edit', compact('role'));
    }

    public function update(RoleUpdateRequest $request, $id) 
    {
        $role = Role::findOrFail($id);

        $role->update($request->validated());

        return redirect('admin.roles');
    }

    public function destroy(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        try{
            $role->delete();
        }
        catch(QueryException $e){
            return redirect('roles')->withErrors([
                'msg' => sprintf('role %s has bank account', $role->name)
            ]);
        }
        
        return redirect('admin.roles');
    }
}
