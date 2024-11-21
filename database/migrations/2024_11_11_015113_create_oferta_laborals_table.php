<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfertaLaboralsTable extends Migration
{
    public function up()
    {
        Schema::create('oferta_laborals', function (Blueprint $table) {
            $table->id();
            $table->string('puesto');
            $table->string('empresa');
            $table->string('ubicacion');
            $table->decimal('salario', 65, 30);
            $table->text('requisitos');
            $table->string('fecha_publicacion');
            $table->string('fecha_limite');
            $table->text('descripcion');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('oferta_laborals');
    }
}
