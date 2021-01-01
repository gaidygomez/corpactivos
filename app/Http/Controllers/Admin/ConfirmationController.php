<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;
use App\Mail\ConfirmationTransaction;
use App\Model\{Deposit, BankEntity, RateOfChange};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ConfirmationController extends Controller
{
    public function confirmationEmail(string $id, BankEntity $bank, RateOfChange $rate)
    {
        $deposit = Deposit::where('deposits.id', $id)
        	 ->join('accounts', 'deposits.ban', '=', 'accounts.beneficiary_bank')
        	 ->join('bank_entities', 'bank_entities.acronym', '=', 'accounts.ban_beneficiary')
        	 ->select('deposits.*', 'accounts.ban_beneficiary', 'bank_entities.name_bank')
        	 ->first();
		
		$rate = $rate->select('peso_bs')->first();
		$amount = $deposit->amount/$rate->peso_bs;

		$bank->where('acronym', $deposit->ban_beneficiary)
			->increment('balance', $amount);

        $deposit->update([
        	'status' => 1
        ]);


        Mail::to($deposit->user->email)
            ->send(new ConfirmationTransaction($deposit, $amount));

        return back()->with('success', 'Email de Confirmación Enviado.');
    }

    public function dailyBalanceCo()
    {
        $deposits = DB::table('deposits')
            ->join('colombian_banks', 'colombian_banks.acronym', '=', 'deposits.bank')
            ->whereDate('deposits.created_at', date('Y-m-d'))
            ->select('deposits.*', 'colombian_banks.name as name_bank', 'colombian_banks.acronym')
            ->paginate();

        $banks = DB::table('colombian_banks')
            ->whereDate('updated_at', date('Y-m-d'))
            ->get();

        return view('admin.balanceCo', compact('deposits', 'banks'));
    }

    public function dailyBalanceVe()
    {
        # code...
    }
}