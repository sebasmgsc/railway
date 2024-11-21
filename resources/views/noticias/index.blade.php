@extends('adminlte::page')

@section('title', 'Noticias')

@section('content_header')
    <h1>Noticias</h1>
@stop

@section('content')
    <a href="{{ route('noticias.create') }}" class="btn btn-primary btn-sm float-right mb-3">
        <i class="fas fa-plus"></i> Crear Noticia
    </a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Autor</th>
                <th>Descripcion</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($noticias as $noticia)
                <tr>
                    <td>{{ $noticia->id }}</td>
                    <td>{{ $noticia->nombre }}</td>
                    <td><img src="{{ url($noticia->imagen) }}" alt="Imagen" width="100"></td>
                    <td>{{ $noticia->autor }}</td>
                    <td>{{ $noticia->descripcion }}</td>
                    <td>{{ $noticia->fecha }}</td>
                    <td>
                        <a href="{{ route('noticias.edit', $noticia->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('noticias.destroy', $noticia->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar esta noticia?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
