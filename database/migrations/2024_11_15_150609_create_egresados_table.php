<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEgresadosTable extends Migration
{
    public function up()
    {
        Schema::create('egresados', function (Blueprint $table) {
            $table->id(); // Campo ID
            $table->string('identificacion')->unique(); // Identificación (única)
            $table->string('nombre_completo');
            $table->string('numero_telefono');
            $table->string('correo_electronico')->unique();
            $table->date('fecha_nacimiento');
            $table->string('programa');
            $table->string('nombre_empresa');
            $table->string('puesto_desempenado');
            $table->date('fecha_inicio');
            $table->date('fecha_termino')->nullable(); // Puede ser nulo si no aplica
            $table->text('funciones_principales'); // Funciones principales (campo de texto largo)
            $table->timestamps(); // Timestamps para created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('egresados');
    }
}
