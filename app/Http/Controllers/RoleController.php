<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleStoreRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Models\Role;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $roles=Role::get();

        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(RoleStoreRequest $request)
    {
       Role::create($request->validated());

        return redirect('roles');
    }

    public function edit(string $id)
    {
        $role  = Role::findOrFail($id);

        return view('roles.edit', compact('role'));
    }

    public function update(RoleUpdateRequest $request, $id) 
    {
        $role = Role::findOrFail($id);

        $role->update($request->validated());

        return redirect('roles');
    }

    public function destroy(Request $request, $id)
    {
        // dd($id);
        $role = Role::findOrFail($id);

        try{
            $role->delete();
        }
        catch(QueryException $e){
            return redirect('roles')->withErrors([
                'msg' => sprintf('role %s has bank account', $role->name)
            ]);
        }
        
        return redirect('roles');
    }
}
