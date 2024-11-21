<?php

namespace App\Http\Controllers;

use App\Models\Egresado;
use Illuminate\Http\Request;

class EgresadoController extends Controller
{
    // Mostrar todos los egresados
    public function index()
    {
        $egresados = Egresado::all();
        return view('egresados.index', compact('egresados'));
    }

    // Mostrar el formulario para crear un nuevo egresado
    public function create()
    {
        return view('egresados.create');
    }

    // Guardar un nuevo egresado en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'identificacion' => 'required|unique:egresados',
            'nombre_completo' => 'required',
            'numero_telefono' => 'required',
            'correo_electronico' => 'required|email|unique:egresados',
            'fecha_nacimiento' => 'required|date',
            'programa' => 'required',
            'nombre_empresa' => 'required',
            'puesto_desempenado' => 'required',
            'fecha_inicio' => 'required|date',
            'fecha_termino' => 'nullable|date',
            'funciones_principales' => 'required',
        ]);

        Egresado::create($request->all());

        return redirect()->route('egresados.index')->with('success', 'Egresado creado exitosamente.');
    }

    // Mostrar el formulario para editar un egresado existente
    public function edit(Egresado $egresado)
    {
        return view('egresados.edit', compact('egresado'));
    }

    // Actualizar los datos de un egresado en la base de datos
    public function update(Request $request, Egresado $egresado)
    {
        $request->validate([
            'identificacion' => 'required|unique:egresados,identificacion,' . $egresado->id,
            'nombre_completo' => 'required',
            'numero_telefono' => 'required',
            'correo_electronico' => 'required|email|unique:egresados,correo_electronico,' . $egresado->id,
            'fecha_nacimiento' => 'required|date',
            'programa' => 'required',
            'nombre_empresa' => 'required',
            'puesto_desempenado' => 'required',
            'fecha_inicio' => 'required|date',
            'fecha_termino' => 'nullable|date',
            'funciones_principales' => 'required',
        ]);

        $egresado->update($request->all());

        return redirect()->route('egresados.index')->with('success', 'Egresado actualizado exitosamente.');
    }

    // Eliminar un egresado de la base de datos
    public function destroy(Egresado $egresado)
    {
        $egresado->delete();

        return redirect()->route('egresados.index')->with('success', 'Egresado eliminado exitosamente.');
    }
}
