<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\ColombianBank;
use Illuminate\Support\Facades\Auth;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{   

    public function index()
    {
    	return view('user.profile');
    }

    public function showBanks()
    {
        $banks = ColombianBank::select('name', 'description', 'ban', 'type')->get();

        return view('user.banks', compact('banks'));
    }

    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), 
        [
            'fname' => ['required', 'string', 'max:50'],
            'sname' => ['nullable', 'string', 'max:50'],
            'lname' => ['required', 'string', 'max:50'],
            'lsname' => ['nullable', 'string', 'max:50'],
            'ci' => ['required', 'string', 'regex:/[a-zA-Z{1,1}]?[0-9]{6,12}+$/'],
            'phone' => ['required', 'string', 'regex:/^[+][0-9]{10,15}+$/'],
        ]);
        
        if ($validator->fails()) {
            return ['error' => $validator->errors()->all()];
        }

        $user = User::find(Auth::id());
        
        $user->update([
            'fname' => $request['fname'],
            'sname' => $request['sname'],
            'lname' => $request['lname'],
            'lsname' => $request['lsname'],
            'ci' => $request['ci'],
            'phone' => $request['phone'],
        ]);
        
        return ['success' => 'Datos actualizados'];
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()->all()];
        }

        $user = User::find(Auth::id());
        
        $user->update([
            'password' => $request['password']
        ]);
        
        return ['success' => 'Contraseña Actualizada'];
    }

    public function updateDataLogin(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'username' => ['required', 'string', 'max:25', 'unique:users,username'],
            'email' => ['required', 'email', 'string', 'unique:users,email', 'max:50']
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()->all()];
        }

        $user = User::find(Auth::id());

        $user->update([
            'username' => $request['username'],
            'email' => $request['email']
        ]);

        return ['success' => 'Datos Actualizados'];
    }
}
