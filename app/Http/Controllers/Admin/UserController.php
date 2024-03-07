<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserStoreRequest;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(UserStoreRequest $request)
    {
       User::create($request->validated());

        return redirect('users');
    }

    public function edit(string $id)
    {
        $user  = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request, $id) 
    {
        $user = User::findOrFail($id);

        $user->update($request->validated());

        return redirect('admin.users');
    }

    public function destroy(Request $request, $id)
    {
        // dd($id);
        $user = User::findOrFail($id);

        try{
            $user->delete();
        }
        catch(QueryException $e){
            return redirect('users')->withErrors([
                'msg' => sprintf('user %s has bank account', $user->name)
            ]);
        }
        
        return redirect('admin.users');
    }
}