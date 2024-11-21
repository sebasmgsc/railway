@extends('adminlte::page')

@section('title', 'Editar Noticia')

@section('content_header')
    <h1>Editar Noticia</h1>
@stop

@section('content')
    <form action="{{ route('noticias.update', $noticia->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $noticia->nombre }}" required>
        </div>

        <div class="form-group">
            <label for="imagen">Imagen</label>
            <input type="text" class="form-control" name="imagen" id="imagen">
            <img src="{{ url($noticia->imagen) }}" alt="Imagen" width="100">

        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" name="descripcion" id="descripcion" required>{{ $noticia->descripcion }}</textarea>
        </div>

        <div class="form-group">
            <label for="autor">Autor</label>
            <input type="text" class="form-control" name="autor" id="autor" value="{{ $noticia->autor }}" required>
        </div>

        <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="date" class="form-control" name="fecha" id="fecha" value="{{ $noticia->fecha }}" required>
        </div>

        <button type="submit" class="btn btn-warning">Actualizar Noticia</button>
    </form>
@stop
