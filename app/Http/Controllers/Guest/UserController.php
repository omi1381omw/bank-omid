<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Requests\Guest\UserLoginRequest;
use App\Http\Requests\Guest\UserRegisterRequest;
use App\Jobs\UserLoginJob;
use App\Jobs\WelcomeUserJob;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login()
    {
        return view('guest.login');
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

    public function register()
    {
        return view('users.register');
    }

    public function registerAuth(UserRegisterRequest $request)
    {
        $inputs = $request->validated();

        $user = User::firstOrCreate($inputs);

        Auth::login($user);

        WelcomeUserJob::dispatch($user);

        return view('welcome');
    }
}
