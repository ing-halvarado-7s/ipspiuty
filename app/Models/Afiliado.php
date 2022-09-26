<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Afiliado extends Model
{
    use HasFactory;

    //Tabla
    protected $table = "afiliado";

    //columnas de uso masivo
    protected $fillable = [
        'user_id',
        'proceso',
        'numero_de_cedula',
        'nombres',
        'apellidos',
        'foto',
        'genero',//1.Femenino, 2.Masculino
        'fecha_de_nacimiento',
        'estado_civil',//1.Soltero, 2.Casado.3.Divorciado.4.Viudo
        'numero_de_telefono',
        'numero_de_celular',
        'correo_electronico',
        'direccion_de_habitacion',
        'fecha_de_ingreso',
        'estatus_laboral',//1.Activo, 2.Jubilado
        'fecha_afiliacion',
        'numero_de_carnet',
        'planificacion_hijos',
        'condiciones_de_salud',

    ];

    //Relacion 1:1. Un afiliado tiene un usuario
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    //Relacion 1:m. Un afiliado tiene uno o varios beneficiarios

    public function beneficiario()
    {
        return $this->hasMany(Beneficiario::class,'afiliado_id');
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
