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
            $table->string('imagenDniFrente');
            $table->string('imagenDniDorso');
            $table->string('email');
            $table->string('telefonoParticular');
            $table->string('telefonoDeContacto');
            $table->string('apellidoMaterno');
            $table->string('apellidoPaterno');
            $table->string('conjugeApellidoNombre');
            $table->string('conjugeDni');
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
