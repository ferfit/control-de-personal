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
        'fechaDeNacimiento',
        'estadoCivil',
        'nacionalidad',
        'domicilio',
        'dni',
        'imagenDniFrente',
        'imagenDniDorso',
        'email',
        'telefonoParticular',
        'telefonoDeContacto',
        'apellidoMaterno',
        'apellidoPaterno',
        'conjugeApellidoNombre',
        'conjugeDni'
    ];
}
