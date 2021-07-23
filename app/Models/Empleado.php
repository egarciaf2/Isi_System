<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $table='empleados';
    protected $primaryKey = 'id';
    protected $fillable = array('idEmpresa', 'nombre', 'apellido', 'email', 'telefono', 'estado', 'created_at', 'updated_at');
    public $incrementing = true;


    public function Empresa()
    {
        return $this->hasOne(Empresa::class, 'id', 'idEmpresa');
    }

}
