<?php

namespace App\Http\Controllers;

use App\Http\Requests\BankAccountStoreRequest;
use App\Models\BankAccount;
use App\Models\User;
use Illuminate\Http\Request;

class BankAccontController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bankAccounts = BankAccount::get();

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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
