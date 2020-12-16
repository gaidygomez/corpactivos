<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('accounts', function (Blueprint $table) {
				$table->id();
				$table->string('beneficiary');// Nombre del Beneficiario
				$table->string('ci');//Cédula del Beneficiario
				$table->string('phone');//Teléfono del Beneficiario
				$table->string('beneficiary_bank');// Banco del Beneficiario
				$table->string('type_account');// Tipo de Cuenta
				$table->string('ban_beneficiary');// Número de Cuenta Bancaria del Beneficiario (BAN)
				$table->unsignedBigInteger('user_id');// FK a tabla usuario | Relacón: 1-m
				$table->foreign('user_id')->references('id')->on('users');// Referencia a la fk en tabla users
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('accounts');
	}
}
