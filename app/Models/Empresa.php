<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table='empresas';
    protected $primaryKey = 'id';
    protected $fillable = array('nombre', 'email', 'logoTipo', 'url', 'estado', 'created_at', 'updated_at');
    public $incrementing = true;

    public function Empleados()
    {
         return $this->hasMany(Empleado::class, 'idEmpresa', 'id');
    }
}
