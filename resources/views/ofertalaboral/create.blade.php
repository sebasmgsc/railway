@extends('adminlte::page')

@section('title', 'Crear Oferta Laboral')

@section('content_header')
    <h1>Crear Nueva Oferta Laboral</h1>
@stop

@section('content')
    <!-- Formulario de Creación de Oferta -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Formulario para Crear Oferta</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('ofertas.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="puesto">Puesto</label>
                    <input type="text" class="form-control @error('puesto') is-invalid @enderror" id="puesto" name="puesto" value="{{ old('puesto') }}" required>
                    @error('puesto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="empresa">Empresa</label>
                    <input type="text" class="form-control @error('empresa') is-invalid @enderror" id="empresa" name="empresa" value="{{ old('empresa') }}" required>
                    @error('empresa')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="ubicacion">Ubicación</label>
                    <input type="text" class="form-control @error('ubicacion') is-invalid @enderror" id="ubicacion" name="ubicacion" value="{{ old('ubicacion') }}" required>
                    @error('ubicacion')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="salario">Salario</label>
                    <input type="number" class="form-control @error('salario') is-invalid @enderror" id="salario" name="salario" value="{{ old('salario') }}" step="0.01" required>
                    @error('salario')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="requisitos">Requisitos</label>
                    <textarea class="form-control @error('requisitos') is-invalid @enderror" id="requisitos" name="requisitos" rows="4" required>{{ old('requisitos') }}</textarea>
                    @error('requisitos')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="fecha_publicacion">Fecha de Publicación</label>
                    <input type="date" class="form-control @error('fecha_publicacion') is-invalid @enderror" id="fecha_publicacion" name="fecha_publicacion" value="{{ old('fecha_publicacion') }}" required>
                    @error('fecha_publicacion')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="fecha_limite">Fecha Límite</label>
                    <input type="date" class="form-control @error('fecha_limite') is-invalid @enderror" id="fecha_limite" name="fecha_limite" value="{{ old('fecha_limite') }}" required>
                    @error('fecha_limite')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" rows="4" required>{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Crear Oferta</button>
                </div>
            </form>
        </div>
    </div>
@stop

@section('css')
    <!-- Estilos adicionales si son necesarios -->
@stop

@section('js')
    <!-- Scripts adicionales si son necesarios -->
    <script>
        // Aquí puedes agregar cualquier funcionalidad extra para tu formulario si lo necesitas
    </script>
@stop
