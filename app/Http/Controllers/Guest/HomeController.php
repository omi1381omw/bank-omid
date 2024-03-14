<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use App\Models\User;
use Error;
use Exception;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function home()
    {
        $usersCount = Cache::get('homepage-users-count');
        if(!$usersCount) {
            $usersCount = User::count();
            Cache::set('homepage-users-count', $usersCount, 10);
        }

        $bankAccountsCount = BankAccount::count();

        return view('guest.welcome', compact('usersCount', 'bankAccountsCount'));
    }
}
