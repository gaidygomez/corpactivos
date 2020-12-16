<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('users', function (Blueprint $table) {
				$table->id();
				$table->string('fname');// Primer Nombre
				$table->string('sname')->nullable();// Segundo Nombre
				$table->string('lname');// Primer Apellido
				$table->string('lsname')->nullable();// Segundo Apellido
				$table->string('ci');// Cédula
				$table->string('phone');// Teléfono
				$table->string('email')->unique();// Email
				$table->string('username')->unique();// Usuario
				$table->string('photo')->nullable();// Foto de perfil
				$table->timestamp('email_verified_at')->nullable();
				$table->string('password');
				$table->smallInteger('role')->default(1);// Roles del usuario: Admin = 0 / User = 1
				$table->rememberToken();
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('users');
	}
}
