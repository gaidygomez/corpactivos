<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\BankEntity;
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
}
