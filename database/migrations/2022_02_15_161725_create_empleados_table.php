<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('lugarDeNacimiento');
            $table->date('fechaDeNacimiento');
            $table->string('estadoCivil');
            $table->string('nacionalidad');
            $table->string('domicilio');
            $table->string('dni');
            $table->string('imagenDniFrente')->nullable();
            $table->string('imagenDniDorso')->nullable();
            $table->string('email');
            $table->string('telefonoParticular');
            $table->string('telefonoDeContacto')->nullable();
            $table->string('apellidoMaterno')->nullable();
            $table->string('apellidoPaterno')->nullable();
            $table->string('conjugeApellidoNombre')->nullable();
            $table->string('conjugeDni')->nullable();
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
        Schema::dropIfExists('empleados');
    }
}


