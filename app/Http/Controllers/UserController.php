<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserStoreRequest $request)
    {
        User::create($request->validated());

        return redirect('users');
    }

    public function show(Request $request, $id)
    {
        $user  = User::findOrFail($id);

        return view('users.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request, $id) 
    {
        $user = User::findOrFail($id);

        $user->update($request->validated());

        return redirect('users');
    }
}