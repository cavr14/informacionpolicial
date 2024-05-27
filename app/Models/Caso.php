<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caso extends Model
{
    use HasFactory;

    protected $table = "caso";
    protected $primaryKey = "idCaso";
    public $incrementing = true;
    protected $keyType = "int";
    protected $fkIDDelito;
    protected $descripcion;
    protected $dates = ["fecha"];
    protected $fkIDSucursal;
    

    protected $fillable = ["fkIDDelito", "descripcion", "fecha", "fkIDSucursal"];
    public $timestamps = false;

    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class, 'fkIDSucursal');
    }

    public function delito()
    {
        return $this->belongsTo(Delito::class, 'fkIDDelito');
    }

    public function getFechaFormattedAttribute()
    {
        return $this->fecha ? $this->fecha->format('m/d/Y') : null;
    }

    public function getFechaInputAttribute()
    {
        return $this->fecha ? $this->fecha->format('Y-m-d') : null;
    }
}

