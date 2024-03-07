<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Requests\Guest\BankAccountOpenRequest;
use App\Jobs\WelcomeUserJob;
use App\Models\BankAccount;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BankAccountController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function open()
    {
        return view('guest.bank_accounts.open');
    }


    public function perform(BankAccountOpenRequest $request)
    {
       $inputs = $request->validated();

       $user = User::create($request->validated());

       Auth::login($user);

       WelcomeUserJob::dispatch($user);

       $inputs['balance'] = 0;
       $inputs['account_number'] = random_int(1000,2000);
       $inputs['user_id'] = $user->id;
       $inputs['sheba'] = '123456987456258769521235';
       $inputs['cart'] = '6037697575774184';

       BankAccount::create($inputs);

       return redirect('/');

    }
}
