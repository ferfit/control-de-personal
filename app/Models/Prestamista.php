<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamista extends Model
{
    use HasFactory;

    protected $fillable = ['logo','nombre','whatsapp','limiteDiario','descripcion'];


    public function prestamos()
    {
        return $this->hasMany(Prestamo::class);
    }

}
