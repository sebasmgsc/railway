<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class NoticiaController extends Controller
{
    // Mostrar todas las noticias
    public function index()
    {
        $noticias = Noticia::all();
        return view('noticias.index', compact('noticias'));
    }
    public function vistanoticias()
    {
        // Verificar si el usuario está autenticado
        if (!Auth::check()) {
            // Si no está autenticado, redirigir a la página de login
            return redirect()->route('login');
        }

        // Si el usuario está autenticado, obtener las noticias y mostrarlas
        $noticias = \App\Models\Noticia::all();

        return view('indeex', compact('noticias'));
    }
    // Mostrar el formulario para crear una nueva noticia
    public function create()
    {
        return view('noticias.create');
    }

    // Guardar una nueva noticia
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'imagen' => 'required|string|max:2550',
            'descripcion' => 'required|string',
            'autor' => 'required|string|max:255',
            'fecha' => 'required|date',
        ]);

        // Crear la noticia
        Noticia::create([
            'nombre' => $request->nombre,
            'imagen' => $request->imagen,
            'descripcion' => $request->descripcion,
            'autor' => $request->autor,
            'fecha' => $request->fecha,
        ]);

        return redirect()->route('noticias.index')->with('success', 'Noticia creada exitosamente.');
    }

    // Mostrar una noticia específica
    public function show($id)
    {
        $noticia = Noticia::findOrFail($id);
        return view('noticias.show', compact('noticia'));
    }

    // Mostrar el formulario para editar una noticia
    public function edit($id)
    {
        $noticia = Noticia::findOrFail($id);
        return view('noticias.edit', compact('noticia'));
    }

    // Actualizar una noticia existente
public function update(Request $request, $id)
{
    // Validar los datos
    $request->validate([
        'nombre' => 'required|string|max:255',
        'imagen' => 'nullable|url|max:255', // Cambié a nullable, ya que la imagen puede no ser proporcionada
        'descripcion' => 'required|string',
        'autor' => 'required|string|max:255',
        'fecha' => 'required|date',
    ]);

    $noticia = Noticia::findOrFail($id);

    // Si se ha proporcionado una nueva URL de imagen, la actualizamos
    if ($request->has('imagen') && $request->imagen) {
        // Si hay una imagen antigua y es diferente a la nueva, la eliminamos
        if ($noticia->imagen && $noticia->imagen !== $request->imagen) {
            // Aquí puedes agregar lógica adicional para eliminar la imagen de internet si es necesario
            // Pero como la imagen es una URL, supongo que solo necesitas actualizar el campo
        }

        // Actualizamos la imagen con la nueva URL proporcionada
        $noticia->imagen = $request->imagen;
    }

    // Actualizamos el resto de los campos
    $noticia->update($request->only('nombre', 'descripcion', 'autor', 'fecha'));

    return redirect()->route('noticias.index')->with('success', 'Noticia actualizada exitosamente.');
}

    // Eliminar una noticia
    public function destroy($id)
    {
        $noticia = Noticia::findOrFail($id);

        // Eliminar la imagen de la noticia
        Storage::disk('public')->delete($noticia->imagen);

        // Eliminar la noticia de la base de datos
        $noticia->delete();

        return redirect()->route('noticias.index')->with('success', 'Noticia eliminada exitosamente.');
    }
}
