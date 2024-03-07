<?php

namespace App\Http\Controllers;

use App\Http\Requests\BankAccountOpenRequest;
use App\Http\Requests\BankAccountStoreRequest;
use App\Http\Requests\BankAccountUpdateRequest;
use App\Jobs\WelcomeUserJob;
use App\Models\BankAccount;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BankAccontController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bankAccounts = BankAccount::with('user')->get();

        return view('bank_accounts.index', compact('bankAccounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::select('id', 'name')->get();
        
        return view('bank_accounts.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BankAccountStoreRequest $request)
    {
        $inputs = $request->validated();
        $inputs['balance'] = 0;

        BankAccount::create($inputs);

        return redirect('bank_accounts');
    }

    /**
     * Display the specified resource.
     */
    public function open()
    {
        return view('bank_accounts/open');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $bankAccount = BankAccount::findOrFail($id);

        return view('bank_accounts.edit', compact('bankAccount'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BankAccountUpdateRequest $request, $id)
    {
        $bankAccount = BankAccount::findOrFail($id);

        $bankAccount->update($request->validated());

        return redirect('bank_accounts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $bankaccount = BankAccount::findOrFail($id);

        try{
            $bankaccount->delete();
        }
        catch(QueryException $e){
            return redirect('bank_account')->withErrors([
                'msg' => sprintf('user %d has bank account', $bankaccount->id)
            ]);
        }
        
        return redirect('bank_account');
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

