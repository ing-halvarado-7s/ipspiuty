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
        Schema::create('beneficiario', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('afiliado_id');
            $table->string('numero_de_cedula',20);
            $table->string('nombres',80);
            $table->string('apellidos',80);
            $table->string('foto')->nullable();
            $table->integer('genero')->default(1);//1.Femenino, 2.Masculino
            $table->date('fecha_de_nacimiento');
            $table->string('parentesco',15)->default("Madre");
            $table->string('numero_de_telefono',15);
            $table->string('numero_de_celular',15)->nullable();
            $table->string('planificacion_hijos')->default("No");//Si, No
            $table->text('condiciones_de_salud')->default("No padezco enfermedad");
            $table->timestamps();

            $table->foreign('afiliado_id')
            ->references('id')
            ->on('afiliado')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beneficiario');
    }
};
