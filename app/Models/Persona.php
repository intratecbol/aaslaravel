<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $primaryKey="Id_Persona";
    public $timestamps = false;
    public function profesor()
    {
        return $this->hasOne(Profesor::class,'Id_Persona');
    }
    public function user()
    {
        return $this->hasOne(User::class,'Id_Persona');
    }
}
