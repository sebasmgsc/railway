@extends('layouts.app')

@section('content')
    <div class="container">
        @if (auth()->check() && auth()->user()->rol === 'egresado')
            <script>
                // Redirigir al inicio si el usuario es egresado
                window.location.href = "{{ route('vistanoticias') }}";  
            </script>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Gestionar Usuarios') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <!-- Tabla de usuarios -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('Nombre') }}</th>
                                    <th>{{ __('Correo Electrónico') }}</th>
                                    <th>{{ __('Roles') }}</th>
                                    <th>{{ __('Estado') }}</th>
                                    <th>{{ __('Acciones') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <span class="badge bg-secondary">{{ $user->rol }}</span>
                                        </td>
                                        <td>
                                            <!-- Indicador de estado congelado/descongelado -->
                                            <span class="badge" style="background-color: {{ $user->is_frozen ? 'red' : 'green' }}; color:white;">
                                                <i class="bi bi-circle-fill"></i> 
                                                {{ $user->is_frozen ? 'Congelado' : 'Descongelado' }}
                                            </span>
                                        </td>
                                        <td>
                                            @if (auth()->user()->rol === 'administrador')
                                                <!-- Cambiar rol -->
                                                <form action="{{ route('users.assignRole', $user) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <select name="role" class="form-select" onchange="this.form.submit()">
                                                        <option value="administrador" {{ $user->rol === 'administrador' ? 'selected' : '' }}>Administrador</option>
                                                        <option value="docente" {{ $user->rol === 'docente' ? 'selected' : '' }}>Docente</option>
                                                        <option value="egresado" {{ $user->rol === 'egresado' ? 'selected' : '' }}>Egresado</option>
                                                        <option value="director" {{ $user->rol === 'director' ? 'selected' : '' }}>Director</option>
                                                    </select>
                                                </form>

                                                <!-- Congelar / Descongelar -->
                                                <form action="{{ route('users.toggleFreeze', $user) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-warning">
                                                        {{ $user->is_frozen ? 'Descongelar' : 'Congelar' }}
                                                    </button>
                                                </form>

                                                <!-- Eliminar usuario -->
                                                <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                                </form>
                                            @elseif(auth()->user()->rol === 'director')
                                                <!-- Congelar / Descongelar (solo director) -->
                                                <form action="{{ route('users.toggleFreeze', $user) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-warning">
                                                        {{ $user->is_frozen ? 'Descongelar' : 'Congelar' }}
                                                    </button>
                                                </form>
                                            @elseif(auth()->user()->rol === 'docente')
                                                <!-- Docente no puede hacer ninguna acción -->
                                                <span class="text-muted">No tiene permisos</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
