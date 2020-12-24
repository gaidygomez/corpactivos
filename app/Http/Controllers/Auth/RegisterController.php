<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Model\Token;
use App\Providers\RouteServiceProvider;
use App\Model\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => ['required', 'string', 'max:50'],
            'sname' => ['nullable', 'string', 'max:50'],
            'lname' => ['required', 'string', 'max:50'],
            'lsname' => ['nullable', 'string', 'max:50'],
            'ci' => ['required', 'string', 'regex:/[(a-zA-Z){1,1}]?[0-9]{6,12}+$/'],
            'phone' => ['required', 'string', 'regex:/^[+][0-9]{10,15}+$/'],
            'username' => ['required', 'string', 'max:25', 'unique:users,username'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'pre-ci' => ['required', 'string']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'fname' => $data['fname'],
            'sname' => $data['sname'],
            'lname' => $data['lname'],
            'lsname' => $data['lsname'],
            'ci' => $data['pre-ci'].$data['ci'],
            'phone' => $data['phone'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        Token::create([
            'user_id' => $request->user()->id,
            'used' => 1
        ]);
    }
}
