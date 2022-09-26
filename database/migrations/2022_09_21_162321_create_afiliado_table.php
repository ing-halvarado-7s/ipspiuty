<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('afiliado', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('proceso',20);//1.Actualización, 2. Nuevo Ingreso
            $table->string('numero_de_cedula',20);
            $table->string('nombres',80);
            $table->string('apellidos',80);
            $table->string('foto')->nullable();
            $table->string('genero',10)->default("Femenino");//1.Femenino, 2.Masculino
            $table->date('fecha_de_nacimiento');
            $table->string('estado_civil',10)->default("Soltero");//1.Soltero, 2.Casado.3.Divorciado.4.Viudo
            $table->string('numero_de_telefono',15);
            $table->string('numero_de_celular',15)->nullable();
            $table->string('correo_electronico')->nullable();
            $table->string('direccion_de_habitacion');
            $table->date('fecha_de_ingreso');
            $table->string('estatus_laboral',10)->default("Activo");//1.Activo, 2.Jubilado
            $table->date('fecha_afiliacion')->nullable();
            $table->string('numero_de_carnet')->nullable();
            $table->string('planificacion_hijos',4)->default("No");//Si, No
            $table->text('condiciones_de_salud')->default("No padezco enfermedad");

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('afiliado');
    }
};
