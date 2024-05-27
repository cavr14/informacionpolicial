<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
<<<<<<< HEAD
=======
use Carbon\Carbon;
>>>>>>> 515d643041c0c1deff8cf41d9c998feec632b747

class Vigilante extends Model
{
    use HasFactory;
    protected $table = "vigilante";
    protected $primaryKey = "idVigilante";
    public $incrementing = true;
    protected $keyType = "int";
    protected $nombre;
    protected $primerApellido;
    protected $segundoApellido;
    protected $dates = ['fechaNacimiento'];
    protected $telefono;
<<<<<<< HEAD
    protected $estado;
    
    protected $fillable = ['nombre', 'primerApellido', 'segundoApellido', 'fechaNacimiento', 'telefono', 'estado'];
=======
    protected $primerApellido;
    protected $segundoApellido;
    protected $dates = ['fechaNacimiento'];
    protected $telefono;
    protected $estado;
    
    protected $fillable = ['nombre', 'primerApellido', 'segundoApellido', 'fechaNacimiento', 'telefono', 'estado'];
    
    protected $fillable = ['nombre', 'primerApellido', 'segundoApellido', 'fechaNacimiento', 'telefono', 'estado'];
>>>>>>> 515d643041c0c1deff8cf41d9c998feec632b747
    public $timestamps = false;

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = strtoupper($value);
    }

    public function setPrimerApellidoAttribute($value)
    {
        $this->attributes['primerApellido'] = strtoupper($value);
    }

    public function setSegundoApellidoAttribute($value)
    {
        $this->attributes['segundoApellido'] = strtoupper($value);
    }

    public function getEdadAttribute()
    {
        return $this->fechaNacimiento ? Carbon::parse($this->fechaNacimiento)->age : null;
    }

    public function getFechaNacimientoFormattedAttribute()
    {
        return $this->fechaNacimiento ? $this->fechaNacimiento->format('Y-m-d') : null;
    }
}
