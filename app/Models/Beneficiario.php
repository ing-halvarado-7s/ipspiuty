<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiario extends Model
{
    use HasFactory;


    //Tabla
    protected $table = "beneficiario";

    //columnas de uso masivo
    protected $fillable = [
        'afiliado_id',
        'numero_de_cedula',
        'nombres',
        'apellidos',
        'foto',
        'genero',//1.Femenino, 2.Masculino
        'fecha_de_nacimiento',
        'parentesco',//Madre, Padre, Esposo, Esposa, Hija, Hijo
        'numero_de_telefono',
        'numero_de_celular',
        'planificacion_hijos',
        'condiciones_de_salud',
    ];

    //Relacion 1:m. Un beneficiario pertenece a un afiliado
    public function afiliado()
    {
        return $this->belongsTo(Afiliado::class,'afiliado_id');
    }

    //Funciones de búsqueda, Query Scope
    public function scopeNombre($query, $nombre, $apellido){

        if (($nombre ) && ($apellido)) {
            return $query->where('nombres','LIKE',"%$nombre%")
                         ->where('apellidos','LIKE',"%$apellido%");
        }else if ($nombre ){
            return $query->where('nombres','LIKE',"%$nombre%");
        }else {
            return $query->where('apellidos','LIKE',"%$apellido%");
        }

    }
}
