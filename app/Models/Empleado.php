<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'lugarDeNacimiento',
        'estadoCivil',
        'nacionalidad',
        'domicilio',
        'dni',
        'dniFrente',
        'dniDorso',
        'email',
        'telefonoParticular',
        'telefonoDeContacto',
        'apellidoMaterno',
        'apellidoPaterno',
        'conjugeApellidoNombre',
        'conjugeDni'
    ];
}
