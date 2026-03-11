<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tabledecanofun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DecanofunController extends Controller
{
    public function index()
    {
        $registros = Tabledecanofun::where('estado', 1)->get();
        $editar = null;

        return view('admin.decanofun.index', compact('registros', 'editar'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo_pagina' => 'nullable|string',
            'nombre'        => 'nullable|string',
            'imagen'        => 'nullable|image',
            'funciones'     => 'nullable|array',
            'funciones.*'   => 'nullable|string',
        ]);

        if ($request->hasFile('imagen')) {
            $imagen = time().'.'.$request->imagen->extension();
            $request->imagen->move(public_path('imagenes'), $imagen);
            $data['imagen'] = $imagen;
        }

        $data['funciones'] = array_values(array_filter($request->funciones ?? []));

        Tabledecanofun::create($data);

        return redirect()->route('decanofun.index')->with('success', 'Registrado correctamente');
    }

    public function edit($id)
    {
        $editar = Tabledecanofun::findOrFail($id);
        $registros = Tabledecanofun::where('estado', 1)->get();

        return view('admin.decanofun.index', compact('editar', 'registros'));
    }

    public function update(Request $request, $id)
    {
        $registro = Tabledecanofun::findOrFail($id);

        $data = $request->validate([
            'titulo_pagina' => 'nullable|string',
            'nombre'        => 'nullable|string',
            'imagen'        => 'nullable|image',
            'funciones'     => 'nullable|array',
            'funciones.*'   => 'nullable|string',
        ]);

        if ($request->hasFile('imagen')) {
            if ($registro->imagen && File::exists(public_path('imagenes/'.$registro->imagen))) {
                File::delete(public_path('imagenes/'.$registro->imagen));
            }

            $imagen = time().'.'.$request->imagen->extension();
            $request->imagen->move(public_path('imagenes'), $imagen);
            $data['imagen'] = $imagen;
        }

        $data['funciones'] = array_values(array_filter($request->funciones ?? []));

        $registro->update($data);

        return redirect()->route('decanofun.index')->with('success', 'Actualizado correctamente');
    }

    public function destroy($id)
    {
        $registro = Tabledecanofun::findOrFail($id);

        if ($registro->imagen && File::exists(public_path('imagenes/'.$registro->imagen))) {
            File::delete(public_path('imagenes/'.$registro->imagen));
        }

        $registro->delete();

        return redirect()->route('decanofun.index')->with('success', 'Eliminado correctamente');
    }
}
