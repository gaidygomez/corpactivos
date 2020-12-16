<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccountRequest;
use App\Model\Account;
use App\Model\BankEntity;
use App\Model\User;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        $banks = BankEntity::select('name_bank', 'acronym')->get();
        
        $accounts = Account::where('user_id', '=', Auth::id())
            ->join('bank_entities', 'accounts.ban_beneficiary', '=', 'bank_entities.acronym')
            ->select('accounts.*', 'bank_entities.name_bank', 'bank_entities.acronym')
            ->orderBy('beneficiary')
            ->paginate(5);

        return view('user.register-accounts', compact('banks', 'accounts'));
    }

    public function registerAccount(AccountRequest $request)
    {
        $account = new Account([
            'beneficiary' => $request['bname'],
            'beneficiary_bank' => $request['bban'],
            'ci' => $request['ci'],
            'phone' => $request['phone'],
            'type_account' => $request['taccount'],
            'ban_beneficiary' => $request['bbank'],
        ]);

        $request->user()->accounts()->save($account);

        return back()->with('success', 'La cuenta fue Registrada');
    }
}
