<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/code', 'VerifyCodeController@index')->name('code');
Route::post('/code', 'VerifyCodeController@verify')->name('code');
Route::get('/code/resend', 'VerifyCodeController@resendCode')->name('resend.code');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

#########------------------ Rutas de Usuario ---------------------------#########

Route::namespace('User')->middleware('auth')->group(function (){
	########-------------- Perfil de Usuario ----------#########
	Route::get('profile', 'UserController@index')->name('profile');
	Route::post('profile', 'UserController@updateProfile');
	Route::post('update-password', 'UserController@updatePassword');
	Route::post('update-login', 'UserController@updateDataLogin');
	########-------------- Registro de Cuentas ---------#########
	Route::get('accounts', 'AccountController@index')->name('accounts');
	Route::post('accounts', 'AccountController@registerAccount')->name('register.account');
	########-------------- Registro de Pagos -----------#########
	Route::get('payments', 'PaymentController@index')->name('payments');
	Route::post('payments', 'PaymentController@registerPayment')->name('register.payment');
	########-------------- Cuentas Bancarias a las que puede depositar --------#########
	Route::get('banks', 'UserController@showBanks')->name('banks');
});

#########----------------- Rutas Administrador  -------------------------#########

Route::get('admin', 'Admin\AdminController@showLoginForm')->name('admin.index');
Route::post('admin', 'Admin\AdminController@login')->name('admin.login');
Route::get('marquee', 'Admin\RateOfChangeController@rateOfChange')->name('rate');

Route::namespace('Admin')->prefix('admin')->middleware('admin')->group(function (){
	Route::get('dashboard', 'AdminController@index')->name('admin.dashboard');
	Route::post('logout', 'AdminController@logout')->name('admin.logout');
	Route::get('rate', 'AdminController@rate')->name('admin.rates');
	Route::post('rate', 'RateOfChangeController@rate')->name('admin.rates.change');
	Route::get('history', 'AdminController@history')->name('admin.history');
	Route::get('confirmation/{id}', 'ConfirmationController@confirmationEmail')->name('admin.email.confirmation');
	Route::get('balance', 'BalanceController@showBalance')->name('balance.admin');
	Route::post('balance', 'BalanceController@valuesBalance')->name('balance.values');
	Route::get('banks', 'BalanceController@banksColombians')->name('banks.admin');
	Route::post('banks', 'BalanceController@addBanks')->name('banks.edit');
	Route::get('banks/{id}/colombian', 'BalanceController@deleteBank')->name('banks.delete');
	Route::get('banks/venezuela', 'BalanceController@banksVenezuela')->name('banks.vzla');
	Route::post('banks/venezuela', 'BalanceController@addBanksVzla')->name('banks.vzla.post');
	Route::get('banks/venezuela/{id}', 'BalanceController@deleteBanksVzla')->name('banks.vzla.delete');
});