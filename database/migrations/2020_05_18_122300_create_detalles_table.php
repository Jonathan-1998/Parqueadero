<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Hora_entrada');
            $table->string('fecha');
            $table->bigInteger('idVehiculo')->unsigned();
            $table->foreign('idVehiculo')->references('id')->on('vehiculos');
            $table->bigInteger('idCliente')->unsigned();
            $table->foreign('idCliente')->references('id')->on('clientes');
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
        Schema::dropIfExists('detalles');
    }
}
