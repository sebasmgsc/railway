<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth'); // Asegúrate de que solo los usuarios autenticados accedan a las funciones
    }
    
    public function index()
{
    // Si el usuario está congelado, lo desconectamos y lo redirigimos
    if (auth()->user()->is_frozen) {
        auth()->logout();
        return redirect('/')->with('error', 'Tu cuenta está congelada. Has sido desconectado.');
    }

    // Recuperamos todos los usuarios para gestionar roles y acciones
    $users = User::all();
    return view('home', compact('users'));
}


    // Asignar un rol a un usuario
        public function assignRole(Request $request, User $user)
    {
        // Validamos que el rol enviado sea uno de los valores permitidos
        $validRoles = ['administrador', 'docente', 'egresado'];

        if (in_array($request->role, $validRoles)) {
            // Asignamos el nuevo rol al usuario
            $user->rol = $request->role;
            $user->save();

            return back()->with('status', 'Rol asignado correctamente.');
        }

        return back()->withErrors('Rol no válido.');
    }

    

    // Eliminar un rol de un usuario
    public function removeRole(Request $request, User $user)
    {
        // Validamos que el rol enviado exista en los roles del usuario
        $role = $user->roles->find($request->role);
        
        if ($role) {
            $user->removeRole($role);
            return back()->with('status', 'Rol eliminado correctamente.');
        }

        return back()->withErrors('Rol no encontrado.');
    }

    // Congelar o descongelar un usuario
    public function toggleFreeze(User $user)
    {
        // Cambiamos el estado de congelación
        $user->is_frozen = !$user->is_frozen;
        $user->save();

        return back()->with('status', $user->is_frozen ? 'Usuario congelado.' : 'Usuario descongelado.');
    }

    // Eliminar un usuario
    public function destroy(User $user)
    {
        // Eliminamos al usuario
        $user->delete();
        return back()->with('status', 'Usuario eliminado correctamente.');
    }
}
