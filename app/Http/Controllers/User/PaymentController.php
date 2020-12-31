<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Model\ColombianBank;
use App\Model\Deposit;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index()
    {
        $banks = ColombianBank::select('name', 'acronym')->get();

        $accounts = auth()->user()->accounts()
            ->join('bank_entities', 'accounts.ban_beneficiary', '=', 'bank_entities.acronym')
            ->select('accounts.*', 'bank_entities.name_bank', 'bank_entities.acronym')
            ->get();

        $payments = auth()->user()->deposits()
            ->join('accounts', 'deposits.ban', '=', 'accounts.beneficiary_bank')
            ->join('colombian_banks', 'deposits.bank', '=', 'colombian_banks.acronym')
            ->join('bank_entities', 'accounts.ban_beneficiary', '=', 'bank_entities.acronym')
            ->select('deposits.*', 'colombian_banks.name', 'accounts.beneficiary', 'bank_entities.name_bank')
            ->orderByDesc('created_at')
            ->paginate(5);

        return view('user.register-payment', compact('banks', 'accounts', 'payments'));
    }
    
    public function registerPayment(PaymentRequest $request, ColombianBank $bank)
    {

        $type_account = $request->user()->accounts()
            ->select('type_account')
            ->where('beneficiary_bank', '=', $request['bname'])->first();

        $name = Auth::user()->fname." ".Auth::user()->lname;

        $payment = New Deposit([
            'name' => $name,
            'ban' => $request['bname'],
            'bank' => $request['bban'],
            'type_account' => $type_account->type_account,
            'amount' => $request['amount'],
            'voucher' => $request['voucher'],
            'photo_voucher' => $request->file('photo_voucher')->store('pagos'),
        ]);

        $bank->where('acronym', $request['bban'])
            ->increment('balance', $request['amount']);

        $request->user()->deposits()->save($payment);

        return back()->with('success', 'El Pago fue Procesado');
    }
}
