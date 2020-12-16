<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRateOfChangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rate_of_changes', function (Blueprint $table) {
            $table->id();
            $table->float('dolar_peso', 10, 2);
            $table->float('dolar_bs', 10, 2);
            $table->float('peso_bs', 10, 2);
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
        Schema::dropIfExists('rate_of_changes');
    }
}
