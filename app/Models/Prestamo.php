<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

    protected $fillable = ['titulo','descripcion','monto','prestamista_id'];


    public function prestamista()
    {
        return $this->belongsTo(Prestamista::class);
    }

}
