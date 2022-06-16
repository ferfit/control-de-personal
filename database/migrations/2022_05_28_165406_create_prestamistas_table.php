<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestamistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamistas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->string('logo')->nullable();
            $table->string('whatsapp')->nullable();
            $table->integer('limiteDiario')->nullable();
            $table->enum('estado',['activado','desactivado']);
            $table->timestamps();
            /*provincia, ciudad, telefono de contacto, email, direccion,sucursales,tipo de operacion (virtual, fisico), cuit*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestamistas');
    }
}
