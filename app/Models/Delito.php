<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delito extends Model
{
    use HasFactory;

    protected $table = "delito";
    protected $primaryKey = "idDelito";
    public $incrementing = true;
    protected $keyType = "int";
    protected $nombre;
    protected $estado;
    
    protected $fillable = ["nombre", "estado"];
    public $timestamps = false;

    // Método de acceso para convertir el nombre a mayúsculas antes de guardar
    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = strtoupper($value);
    }
}