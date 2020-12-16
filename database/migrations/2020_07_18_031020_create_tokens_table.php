<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTokensTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('tokens', function (Blueprint $table) {
				$table->id();
				$table->string('code', 6);
				$table->unsignedBigInteger('user_id');
				$table->boolean('used')->default(false);
				$table->timestamps();

				$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('tokens');
	}
}
