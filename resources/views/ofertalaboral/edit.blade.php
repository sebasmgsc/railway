@extends('adminlte::page')

@section('title', 'Editar Oferta Laboral')

@section('content_header')
    <h1>Editar Oferta Laboral</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Formulario de Edición de Oferta Laboral</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('ofertalaboral.update', $oferta->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Método para actualización -->

                <!-- Campo de puesto -->
                <div class="form-group">
                    <label for="puesto">Puesto</label>
                    <input type="text" class="form-control" id="puesto" name="puesto" value="{{ old('puesto', $oferta->puesto) }}" required>
                </div>

                <!-- Campo de empresa -->
                <div class="form-group">
                    <label for="empresa">Empresa</label>
                    <input type="text" class="form-control" id="empresa" name="empresa" value="{{ old('empresa', $oferta->empresa) }}" required>
                </div>

                <!-- Campo de ubicación -->
                <div class="form-group">
                    <label for="ubicacion">Ubicación</label>
                    <input type="text" class="form-control" id="ubicacion" name="ubicacion" value="{{ old('ubicacion', $oferta->ubicacion) }}" required>
                </div>

                <!-- Campo de salario -->
                <div class="form-group">
                    <label for="salario">Salario</label>
                    <input type="number" step="0.01" class="form-control" id="salario" name="salario" value="{{ old('salario', $oferta->salario) }}" required>
                </div>

                <!-- Campo de requisitos -->
                <div class="form-group">
                    <label for="requisitos">Requisitos</label>
                    <textarea class="form-control" id="requisitos" name="requisitos" required>{{ old('requisitos', $oferta->requisitos) }}</textarea>
                </div>

                <!-- Campo de fecha de publicación -->
                <div class="form-group">
                    <label for="fecha_publicacion">Fecha de Publicación</label>
                    <input type="date" class="form-control" id="fecha_publicacion" name="fecha_publicacion" value="{{ old('fecha_publicacion', $oferta->fecha_publicacion) }}" required>
                </div>

                <!-- Campo de fecha límite -->
                <div class="form-group">
                    <label for="fecha_limite">Fecha Límite</label>
                    <input type="date" class="form-control" id="fecha_limite" name="fecha_limite" value="{{ old('fecha_limite', $oferta->fecha_limite) }}" required>
                </div>

                <!-- Campo de descripción -->
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" required>{{ old('descripcion', $oferta->descripcion) }}</textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Actualizar Oferta</button>
                    <a href="{{ route('ofertalaboral.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@stop

@section('css')
    <!-- Agregar estilos adicionales si es necesario -->
@stop

@section('js')
    <!-- Agregar scripts adicionales si es necesario -->
@stop
