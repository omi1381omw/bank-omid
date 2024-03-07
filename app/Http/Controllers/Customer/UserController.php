<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Jobs\UserGoodbyJob;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function logout()
    {
        $user = Auth::user();

        Auth::logout();

        UserGoodbyJob::dispatch($user);

        return view('guest.welcome');
    }

}
