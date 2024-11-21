<?php

namespace App\Http\Controllers;

use App\Models\OfertaLaboral;
use Illuminate\Http\Request;

class OfertaLaboralController extends Controller
{
    // Mostrar todas las ofertas laborales
    public function index()
    {
        $ofertas = OfertaLaboral::all(); // Obtener todas las ofertas laborales
        return view('ofertalaboral.index', compact('ofertas'));
    }
    public function vistaofertas()
    {
        $ofertas = OfertaLaboral::all();
        return view('indeex2', compact('ofertas'));
    }
    // Mostrar el formulario para crear una nueva oferta
    public function create()
    {
        return view('ofertalaboral.create');
    }

    // Guardar una nueva oferta laboral
    public function store(Request $request)
    {
        // Validar los datos enviados por el formulario
        $request->validate([
            'puesto' => 'required|string|max:255',
            'empresa' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'salario' => 'required|numeric',
            'requisitos' => 'required|string',
            'fecha_publicacion' => 'required|date',
            'fecha_limite' => 'required|date',
            'descripcion' => 'required|string',
        ]);

        // Crear la nueva oferta laboral
        OfertaLaboral::create($request->all());

        // Redirigir a la vista principal con un mensaje de éxito
        return redirect()->route('ofertalaboral.index')->with('success', 'Oferta laboral creada con éxito.');
    }

    
    // Mostrar el formulario para editar una oferta laboral
    public function edit($id)
    {
        $oferta = OfertaLaboral::findOrFail($id); // Buscar la oferta por ID
        return view('ofertalaboral.edit', compact('oferta'));
    }

    // Actualizar una oferta laboral existente
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'puesto' => 'required|string|max:255',
            'empresa' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'salario' => 'required|numeric',
            'requisitos' => 'required|string',
            'fecha_publicacion' => 'required|date',
            'fecha_limite' => 'required|date',
            'descripcion' => 'required|string',
        ]);

        // Buscar la oferta laboral
        $oferta = OfertaLaboral::findOrFail($id);

        // Actualizar la oferta laboral con los nuevos datos
        $oferta->update($request->all());

        // Redirigir a la vista principal con un mensaje de éxito
        return redirect()->route('ofertalaboral.index')->with('success', 'Oferta laboral actualizada con éxito.');
    }

    // Eliminar una oferta laboral
    public function destroy($id)
    {
        // Buscar la oferta laboral
        $oferta = OfertaLaboral::findOrFail($id);

        // Eliminar la oferta laboral
        $oferta->delete();

        // Redirigir a la vista principal con un mensaje de éxito
        return redirect()->route('ofertalaboral.index')->with('success', 'Oferta laboral eliminada con éxito.');
    }
}
