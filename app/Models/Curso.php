<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $fillables=["Codigo_Curso",	"Nombre_Curso",	"Id_Seccion_Curso",	"Ciclo_Curso"];
    protected $primaryKey="Id_Curso";
    public $timestamps = false;
}
