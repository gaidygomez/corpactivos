<?php

namespace App\Http\Controllers\Admin;

use App\Model\User;
use App\Model\Deposit;
use App\Model\RateOfChange;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::ADMIN;

    public function showLoginForm()
    {
        return view('admin.indexAdmin');
    }

    public function index()
    {
        return view('admin.dahsboard');
    }

    public function rate()
    {
        return view('admin.rateOfChange');
    }

    public function confirmation()
    {
        $deposits = Deposit::where('deposits.status', 0)
            ->join('accounts', 'deposits.ban', '=', 'accounts.beneficiary_bank')
            ->join('bank_entities', 'bank_entities.acronym', '=', 'accounts.ban_beneficiary')
            ->join('colombian_banks', 'deposits.bank', '=', 'colombian_banks.acronym')
            ->select('deposits.*', 'accounts.beneficiary', 'accounts.ci', 'accounts.phone', 'bank_entities.name_bank', 'colombian_banks.name')
            ->paginate(25);

        $change = RateOfChange::select('peso_bs')->first();

        return view('admin.confirmation', compact('deposits', 'change'));
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        $login = $request->input($this->username());

        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        return [
            $field     => $login,
            'password' => $request->input('password')
        ];
    }

    public function username()
    {
        return 'login';
    }
}
