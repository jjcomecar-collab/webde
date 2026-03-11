<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tableadministradorfun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class administradorfunController extends Controller
{
    public function index()
    {
        $registros = Tableadministradorfun::where('estado', 1)->get();
        $editar = null;

        return view('admin.administradorfun.index', compact('registros', 'editar'));
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

        Tableadministradorfun::create($data);

        return redirect()->route('administradorfun.index')->with('success', 'Registrado correctamente');
    }

    public function edit($id)
    {
        $editar = Tableadministradorfun::findOrFail($id);
        $registros = Tableadministradorfun::where('estado', 1)->get();

        return view('admin.administradorfun.index', compact('editar', 'registros'));
    }

    public function update(Request $request, $id)
    {
        $registro = Tableadministradorfun::findOrFail($id);

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

        return redirect()->route('administradorfun.index')->with('success', 'Actualizado correctamente');
    }

    public function destroy($id)
    {
        $registro = Tableadministradorfun::findOrFail($id);

        if ($registro->imagen && File::exists(public_path('imagenes/'.$registro->imagen))) {
            File::delete(public_path('imagenes/'.$registro->imagen));
        }

        $registro->delete();

        return redirect()->route('administradorfun.index')->with('success', 'Eliminado correctamente');
    }
}
