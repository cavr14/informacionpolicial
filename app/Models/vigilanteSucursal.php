<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vigilanteSucursal extends Model
{
    use HasFactory;
    protected $table = "vigilantesucursal";
    protected $primaryKey = "idVigilanteSucursal";
    public $incrementing = true;
    protected $keyType = "int";
    protected $fkIDSucursal;
    protected $fkIDVigilante;
    protected $armado;
    protected $dates = ["fechaInicio", "fechaFin"];

    protected $fillable = ["fkIDSucursal","fkIDVigilante","armado","fechaInicio","fechaFin"];
    public $timestamps = false;

    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class, 'fkIDSucursal');
    }

    public function vigilante()
    {
        return $this->belongsTo(Vigilante::class, 'fkIDVigilante');
    }

    public function getFechaInicioFormattedAttribute()
    {
        return $this->fechaInicio ? $this->fechaInicio->format('m/d/Y') : null;
    }

    public function getFechaInicioInputAttribute()
    {
        return $this->fechaInicio ? $this->fechaInicio->format('Y-m-d') : null;
    }

    public function getFechaFinFormattedAttribute()
    {
        return $this->fechaFin ? $this->fechaFin->format('m/d/Y') : null;
    }
}
