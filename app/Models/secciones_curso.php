<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class secciones_curso extends Model
{
    use HasFactory;
    protected $fillables=['Nombre_Seccion'];
    protected $primaryKey='Id_Seccion_Curso';
    protected $table='secciones_cursos';
}
