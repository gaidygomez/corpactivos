<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\BankEntity;
use App\Model\ColombianBank;
use Illuminate\Http\Request;

class BalanceController extends Controller
{
    public function showBalance()
    {
        $banks = BankEntity::select('id', 'name_bank', 'acronym', 'balance')->get();
        return view('admin.balance', compact('banks'));
    }

    public function valuesBalance(Request $request)
    {
        $request->validate([
            'balance' => 'required|numeric',
            'bank' => 'required'
        ]);

        BankEntity::where('acronym', $request['bank'])->update([
            'balance' => $request['balance']
        ]);

        return back()->with('success', 'Balance Actualizado');
    }
    
    public function banksColombians()
    {
        $banks = ColombianBank::paginate();

        return view('admin.banks', compact('banks'));
    }

    public function addBanks(Request $request)
    {
        $request->validate([
            'bank' => 'required|string',
            'acronym' => 'required|string|unique:App\Model\ColombianBank,acronym',
            'balance' => 'required|numeric',
            'type' => 'required',
            'description' => 'nullable|string',
            'ban' => 'required|numeric|digits_between:12,20'
        ]);
        
        ColombianBank::create([
            'name' => $request['bank'],
            'description' => $request['description'],
            'balance' => $request['balance'],
            'type' => $request['type'],
            'acronym' => $request['acronym'],
            'ban' => $request['ban']
        ]);

        return back()->with('success', 'El Banco ha sido añadido');

    }
}
