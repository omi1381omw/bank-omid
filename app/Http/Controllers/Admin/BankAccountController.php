<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BankAccountStoreRequest;
use App\Http\Requests\BankAccountUpdateRequest;
use App\Models\BankAccount;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class BankAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bankAccounts = BankAccount::with('user')->get();

        return view('admin.bank_accounts.index', compact('bankAccounts'));
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
}

