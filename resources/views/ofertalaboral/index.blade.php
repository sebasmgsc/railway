@extends('adminlte::page')

@section('title', 'Ofertas Laborales')

@section('content_header')
    <h1>Ofertas Laborales</h1>
@stop

@section('content')
    <!-- Verificar el rol del usuario -->
    @if (auth()->user()->rol === 'egresado')
        @php
            auth()->logout();  // Cerrar sesión si es egresado
        @endphp
        <script>
            window.location.href = "{{ route('home') }}";  // Redirigir al home (login o página principal)
        </script>
    @endif

    <!-- Tabla de Ofertas Laborales -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Ofertas Laborales</h3>
            <!-- Mostrar el botón de "Crear Nueva Oferta" solo a administradores y directores -->
            @if (auth()->user()->rol === 'administrador' || auth()->user()->rol === 'director' || auth()->user()->rol === 'docente')
                <a href="{{ route('ofertalaboral.create') }}" class="btn btn-primary btn-sm float-right">
                    <i class="fas fa-plus"></i> Crear Nueva Oferta
                </a>
            @endif
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Puesto</th>
                        <th>Empresa</th>
                        <th>Ubicación</th>
                        <th>Salario</th>
                        <th>Requisitos</th>
                        <th>Fecha de Publicación</th>
                        <th>Fecha Límite</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ofertas as $oferta)
                        <tr>
                            <td>{{ $oferta->id }}</td>
                            <td>{{ $oferta->puesto }}</td>
                            <td>{{ $oferta->empresa }}</td>
                            <td>{{ $oferta->ubicacion }}</td>
                            <td>${{ number_format($oferta->salario, 2, ',', '.') }}</td>
                            <td>{{ Str::limit($oferta->requisitos, 50) }}</td>
                            <td>{{ \Carbon\Carbon::parse($oferta->fecha_publicacion)->format('d/m/Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($oferta->fecha_limite)->format('d/m/Y') }}</td>
                            <td>{{ $oferta->descripcion}}</td>
                            <td>
                                @if (auth()->user()->rol === 'administrador' || auth()->user()->rol === 'director')
                                    <a href="{{ route('ofertalaboral.edit', $oferta->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <form action="{{ route('ofertalaboral.destroy', $oferta->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar esta oferta?')">
                                            <i class="fas fa-trash"></i> Eliminar
                                        </button>
                                    </form>
                                @elseif(auth()->user()->rol === 'docente')
                                    <a href="{{ route('ofertalaboral.edit', $oferta->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <!-- Estilos adicionales si son necesarios -->
@stop

@section('js')
    <script>
        $(document).ready(function() {
            // Inicializar la tabla como DataTable
            $('table').DataTable({
                responsive: true
            });
        });
    </script>
@stop
