@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Egresados</h1>
    <a href="{{ route('egresados.create') }}" class="btn btn-primary mb-4">Nuevo Egresado</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Hacer la tabla responsiva -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Identificación</th>
                    <th>Nombre Completo</th>
                    <th>Número de Teléfono</th>
                    <th>Correo Electrónico</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Programa</th>
                    <th>Nombre de la Empresa</th>
                    <th>Puesto Desempeñado</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha de Término</th>
                    <th>Funciones Principales</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($egresados as $egresado)
                    <tr>
                        <td>{{ $egresado->id }}</td>
                        <td>{{ $egresado->identificacion }}</td>
                        <td>{{ $egresado->nombre_completo }}</td>
                        <td>{{ $egresado->numero_telefono }}</td>
                        <td>{{ $egresado->correo_electronico }}</td>
                        <td>{{ \Carbon\Carbon::parse($egresado->fecha_nacimiento)->format('d/m/Y') }}</td>
                        <td>{{ $egresado->programa }}</td>
                        <td>{{ $egresado->nombre_empresa }}</td>
                        <td>{{ $egresado->puesto_desempenado }}</td>
                        <td>{{ \Carbon\Carbon::parse($egresado->fecha_inicio)->format('d/m/Y') }}</td>
                        <td>{{ $egresado->fecha_termino ? \Carbon\Carbon::parse($egresado->fecha_termino)->format('d/m/Y') : 'No aplica' }}</td>
                        <td class="text-truncate" style="max-width: 200px;">
                            {{ $egresado->funciones_principales }}
                        </td>
                        <td>
                            <a href="{{ route('egresados.edit', $egresado->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('egresados.destroy', $egresado->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
