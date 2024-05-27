<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    use HasFactory;
    protected $table = "sucursal";
    protected $primaryKey = "idSucursal";
    public $incrementing = true;
    protected $keyType = "int";
    protected $nombre;
    protected $calle;
    protected $noExterior;
    protected $noInterior;
    protected $colonia;
    protected $cp;
    protected $ciudad;
    protected $provincia;
    protected $noEmpleados;
    protected $estado;
    protected $fkIDEntidadBancaria;

    protected $fillable = ["nombre", "calle", "noExterior", "noInterior", "colonia", "cp", "ciudad", "provincia", "noEmpleados", "estado", "fkIDEntidadBancaria"];
    public $timestamps = false;


    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = strtoupper($value);
    } 
      
    public function setCalleAttribute($value)
    {
        $this->attributes['calle'] = strtoupper($value);
    } 
    public function setProvinciaAttribute($value)
    {
        $this->attributes['provincia'] = strtoupper($value);
    } 
        public function setColoniaAttribute($value)
    {
        $this->attributes['colonia'] = strtoupper($value);
    } 

    public function setCiudadAttribute($value)
    {
        $this->attributes['ciudad'] = strtoupper($value);
    }
    public function casos()
    {
        return $this->hasMany(Caso::class, 'fkIDSucursal');
    }
    public function entidadBancaria()
    {
        return $this->belongsTo(EntidadBancaria::class, 'fkIDEntidadBancaria');
    }
<<<<<<< HEAD
 
=======
>>>>>>> 515d643041c0c1deff8cf41d9c998feec632b747
}
