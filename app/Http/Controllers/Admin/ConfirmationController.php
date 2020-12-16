<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ConfirmationTransaction;
use App\Model\Deposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ConfirmationController extends Controller
{
    public function confirmationEmail(string $id)
    {
        $deposit = Deposit::findOrFail($id);

        Mail::to($deposit->user->email)
            ->send(new ConfirmationTransaction($deposit));

        return back()->with('success', 'Email de Confirmación Enviado.');
    }
}
