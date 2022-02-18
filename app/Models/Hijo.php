<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hijo extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','apellido','dni','empleado_id'];



    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
