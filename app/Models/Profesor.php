<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;
    protected $primaryKey="Id_Profesor";
    public $timestamps = false;
    protected $table='profesores';

    public function persona()
    {
        return $this->belongsTo(Persona::class,'Id_Persona');
    }
}
