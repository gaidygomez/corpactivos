<?php

namespace App\Http\Controllers;

use App\Http\Requests\VerifyCodeRequest;
use App\Model\Token;
use Illuminate\Http\Request;

class VerifyCodeController extends Controller {
	public function index() {
		return view("auth.code");
	}

	public function verify(VerifyCodeRequest $request) {
		$code = $request->user()->tokens()->where('code', $request->code)->first();

		if ($code && $code->isValid()) {

			$code->used = true;
			$code->save();

			return redirect('home');
		}

		return redirect("code")->withErrors("Código Inválido");
	}

	public function resendCode(Request $request) {
		
		$code = Token::create([
			'user_id' => $request->user()->id
		]);
		
		$code->sendCode();
		
		return redirect('code')->with('resend.code', 'Se envío un nuevo código');
	}
}
