<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    protected $primaryKey="Id_Alumno";
    public $timestamps = false;
//    protected $table='profesores';
}
