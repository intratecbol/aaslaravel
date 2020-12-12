<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $fillables=['Usuario_Usuario',
    'Password_Usuario',
    'Nivel_Usuario ',
    'Id_Persona',
    'Estado_Usuario'];
    protected $primaryKey = 'Id_Usuario';
    public $timestamps = false;

}
