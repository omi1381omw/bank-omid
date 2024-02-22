<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PermisionController extends Controller
{

    public function show(Request $request, $id)
    {
        $user  = User::findOrFail($id);

        $roles = $user->roles;

        return view('permisions.show', compact('roles')); 
    }

}
