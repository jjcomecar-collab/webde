<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TableDocentepolitica;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class DocentepoliticaController extends Controller
{
    public function index()
    {
        $docentes = Tabledocentepolitica::where('estado', 1)->get();
        return view('admin.docentepolitica.index', compact('docentes'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|in:nombrado,contratado',
            'imagen' => 'nullable|image',
            'descripcion' => 'nullable|string',
        ]);

        if ($request->hasFile('imagen')) {
            $nombreImagen = Str::uuid().'.'.$request->imagen->extension();
            $request->imagen->move(public_path('imagenes'), $nombreImagen);
            $data['imagen'] = $nombreImagen;
        }

        Tabledocentepolitica::create($data);

        return back()->with('success', 'Docente registrado');
    }

    public function update(Request $request, $id)
    {
        $docente = Tabledocentepolitica::findOrFail($id);

        $data = $request->validate([
            'nombre' => 'required',
            'tipo' => 'required|in:nombrado,contratado',
            'imagen' => 'nullable|image',
            'descripcion' => 'nullable',
        ]);

        if ($request->hasFile('imagen')) {
            if ($docente->imagen && file_exists(public_path('imagenes/'.$docente->imagen))) {
                unlink(public_path('imagenes/'.$docente->imagen));
            }

            $nombreImagen = Str::uuid().'.'.$request->imagen->extension();
            $request->imagen->move(public_path('imagenes'), $nombreImagen);
            $data['imagen'] = $nombreImagen;
        }

        $docente->update($data);

        return back()->with('success', 'Docente actualizado');
    }

    public function destroy($id)
    {
        $docente = Tabledocentepolitica::findOrFail($id);

        if ($docente->imagen && file_exists(public_path('imagenes/'.$docente->imagen))) {
            unlink(public_path('imagenes/'.$docente->imagen));
        }

        $docente->delete();

        return back()->with('success', 'Docente eliminado');
    }
}
