<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nombre del depositante
            $table->string('ban'); // Número de Cuenta Bancaria (BAN en inglés)
            $table->string('bank'); // Nombre del Banco al que hizo la transferencia
            $table->string('type_account'); // Tipo de Cuenta Bancaria
            $table->double('amount', 9, 2); // Monto Transferido (9 enteros y 2 decimales)
            $table->string('voucher'); // Número del Voucher
            $table->string('photo_voucher');
            $table->boolean('status')->default(0); // 0 Pending | 1 Approved
            $table->unsignedBigInteger('user_id'); // FK a tabla usuario | Relacón: 1-m
            $table->foreign('user_id')->references('id')->on('users'); // Referencia a la fk en tabla users
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deposits');
    }
}
