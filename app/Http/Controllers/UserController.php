<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterAuthRequest;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Jobs\UserGoodbyJob;
use App\Jobs\UserLoginJob;
use App\Jobs\WelcomeUserJob;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login()
    {
        return view('users.login');
    }

    public function auth(UserLoginRequest $request)
    {
        $inputs = $request->validated();

        $success = Auth::attempt(['mobile' => $inputs['mobile'], 'password' => $inputs['password']]);

        if(!$success) {
            return view('users.login', ['error' => 'mobile or password is invalid']);
        }

        UserLoginJob::dispatch(Auth::user());

        return redirect('/');
    }

    public function logout()
    {
        $user = Auth::user();

        Auth::logout();

        UserGoodbyJob::dispatch($user);

        return view('welcome');
    }

    public function register()
    {
        return view('users.register');
    }

    public function registerAuth(UserRegisterAuthRequest $request)
    {
        $inputs = $request->validated();

        $user = User::firstOrCreate($inputs);

        Auth::login($user);

        WelcomeUserJob::dispatch($user);

        return view('welcome');
    }


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
        //
    }

    public function edit(string $id)
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
        
        return redirect('users');
    }
}