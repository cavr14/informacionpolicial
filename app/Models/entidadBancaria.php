<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class entidadBancaria extends Model
{
    use HasFactory;
    protected $table = "entidadbancaria";
    protected $primaryKey = "idEntidadBancaria";
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
    protected $estado;
    
    protected $fillable = ["nombre", "calle", "noExterior", "noInterior", "colonia", "cp", "ciudad", "provincia","estado"];
    public $timestamps = false;

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = strtoupper($value);
    }

    public function setCalleAttribute($value)
    {
        $this->attributes['calle'] = strtoupper($value);
    }

    public function setColoniaAttribute($value)
    {
        $this->attributes['colonia'] = strtoupper($value);
    }

    public function setProvinciaAttribute($value)
    {
        $this->attributes['provincia'] = strtoupper($value);
    }
    public function setCiudadAttribute($value)
    {
        $this->attributes['ciudad'] = strtoupper($value);
    }

    public function sucursales()
    {
        return $this->hasMany(Sucursal::class);
    }

}
