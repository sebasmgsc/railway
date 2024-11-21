<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticiasTable extends Migration
{
    public function up()
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); // Nombre de la noticia
            $table->string('imagen'); // Ruta de la imagen
            $table->text('descripcion'); // Descripción de la noticia
            $table->string('autor'); // Autor de la noticia
            $table->string('fecha'); // Fecha de la noticia
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('noticias');
    }
}
