<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OfertaLaboralController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

Route::resource('noticias', NoticiaController::class);
Route::get('inicio', [NoticiaController::class, 'vistanoticias'])->name('vistanoticias');

Route::resource('ofertalaboral', OfertaLaboralController::class);
Route::get('ofertaslaborales', [OfertaLaboralController::class, 'vistaofertas'])->name('vistaofertas');



Route::get('/', function () {
    return redirect()->route('login'); // Redirige a la ruta de login
});

Route::post('/', [LoginController::class, 'login']); // Suponiendo que uses un controlador para manejar el login


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/home', function () {
        return view('dashboard');
    })->name('dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('ofertas/create', [OfertaLaboralController::class, 'create'])->name('ofertas.create');
Route::post('ofertas', [OfertaLaboralController::class, 'store'])->name('ofertas.store');
Route::get('ofertas', [OfertaLaboralController::class, 'index'])->name('ofertas.index');
Route::get('ofertas/', [OfertaLaboralController::class, 'edit'])->name('ofertas.edit');
Route::get('ofertas', [OfertaLaboralController::class, 'destroy'])->name('ofertas.destroy');

// Rutas para gestionar usuarios
    // Mostrar todos los usuarios
    Route::get('/home', [UserController::class, 'index'])->name('index');
    
    // Asignar un rol a un usuario
    Route::post('/{user}/assignRole', [UserController::class, 'assignRole'])->name('users.assignRole');
    
    // Eliminar un rol de un usuario
    Route::post('/{user}/removeRole', [UserController::class, 'removeRole'])->name('users.removeRole');
    
    // Congelar o descongelar un usuario
    Route::post('/{user}/toggleFreeze', [UserController::class, 'toggleFreeze'])->name('users.toggleFreeze');
    
    // Eliminar un usuario
    Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy');
use App\Http\Controllers\EgresadoController;

Route::resource('egresados', EgresadoController::class);
