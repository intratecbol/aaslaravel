<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrativo extends Model
{
    use HasFactory;
    protected $fillables=['Id_Persona','Cod_Administrativo','Fecha_Ingreso_Administrativo'];
    protected $primaryKey = 'Id_Administrativo';


}
