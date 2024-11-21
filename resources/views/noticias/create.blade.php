@extends('adminlte::page')

@section('title', 'Crear Noticia')

@section('content_header')
    <h1>Crear Noticia</h1>
@stop

@section('content')
    <form action="{{ route('noticias.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" required>
        </div>

        <div class="form-group">
            <label for="imagen">Imagen</label>
            <input type="text" class="form-control" name="imagen" id="imagen" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" name="descripcion" id="descripcion" required></textarea>
        </div>

        <div class="form-group">
            <label for="autor">Autor</label>
            <input type="text" class="form-control" name="autor" id="autor" required>
        </div>

        <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="date" class="form-control" name="fecha" id="fecha" required>
        </div>

        <button type="submit" class="btn btn-success">Crear Noticia</button>
    </form>
@stop
