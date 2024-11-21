<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

// Si el usuario no está autenticado, redirigirlo a la página de login
if (!Auth::check()) {
    Auth::logout(); // Cerrar sesión si está logueado pero no autenticado
    return Redirect::route('login'); // Redirigir a la página de login
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Modern Business - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-5">
                    <a class="navbar-brand" href="index.html"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="inicio">Noticias</a></li>
                            <li class="nav-item"><a class="nav-link" href="ofertaslaborales">Ofertas Laborales</a></li>
                            <!-- Dropdown para el nombre de usuario -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }} <!-- Mostrar nombre del usuario autenticado -->
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ route('logout') }}" 
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión</a></li>
                                </ul>
                                <!-- Formulario de cierre de sesión -->
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Header con fondo oscuro modificado para incluir las ofertas laborales -->
            <header class="bg-dark py-5">
                <div class="container px-5">
                    <!-- Sección de ofertas laborales dentro del mismo contenedor -->
                    <div class="row mt-5">
                        <div class="col-12 text-center mb-4">
                            <h2 class="display-6 text-white">Ofertas de Empleo</h2>
                            <p class="lead text-white-50">Consulta las mejores ofertas de trabajo disponibles y aplica a las que se adapten a tu perfil.</p>
                        </div>

                        <!-- Mostrar las ofertas laborales desde el controlador -->
                        @foreach($ofertas as $oferta)
                            <div class="col-md-4 mb-4">
                                <div class="card shadow-sm border-light">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $oferta->puesto }}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{ $oferta->empresa }}</h6>
                                        <p class="card-text">
                                            <strong>Ubicación:</strong> {{ $oferta->ubicacion }}<br>
                                            <strong>Salario:</strong> {{ number_format((int) $oferta->salario, 0, ',', '.') }}<br>
                                            <strong>Fecha de Publicación:</strong> {{ $oferta->fecha_publicacion }}<br>
                                            <strong>Fecha Límite:</strong> {{ $oferta->fecha_limite }}
                                        </p>
                                        <p class="card-text"><strong>Requisitos:</strong><br>
                                            {!! nl2br(e($oferta->requisitos)) !!}
                                        </p>
                                        <p class="card-text"><strong>Descripción:</strong><br>
                                            {{ $oferta->descripcion }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </header>

        </main>

        <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Your Website 2023</div></div>
                    <div class="col-auto">
                        <a class="link-light small" href="#!">Privacy</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Terms</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Contact</a>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
