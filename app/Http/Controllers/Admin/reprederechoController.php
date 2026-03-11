<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tablereprederecho;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReprederechoController extends Controller
{
    public function index()
    {
        $registro = Tablereprederecho::where('estado', 1)->first();
        $registros = Tablereprederecho::orderBy('id', 'desc')->get();

        return view('admin.reprederecho.index', compact('registro', 'registros'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo_pagina' => 'required',
            'inner_title'   => 'required',
            'descripcion'   => 'required',
            'imagen'        => 'nullable|image',
        ]);

        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('imagenes', 'public');
        }

        $data['lista'] = array_filter(explode("\n", $request->lista));
        $data['estado'] = 1;

        Tablereprederecho::create($data);

        return redirect()->back()->with('success', 'Registro creado');
    }

    public function update(Request $request, $id)
    {
        $registro = Tablereprederecho::findOrFail($id);

        $data = $request->validate([
            'titulo_pagina' => 'required',
            'inner_title'   => 'required',
            'descripcion'   => 'required',
            'imagen'        => 'nullable|image',
        ]);

        if ($request->hasFile('imagen')) {
            if ($registro->imagen) {
                Storage::disk('public')->delete($registro->imagen);
            }
            $data['imagen'] = $request->file('imagen')->store('imagenes', 'public');
        }

        $data['lista'] = array_filter(explode("\n", $request->lista));

        $registro->update($data);

        return redirect()->back()->with('success', 'Registro actualizado');
    }

    public function destroy($id)
    {
        $registro = Tablereprederecho::findOrFail($id);

        if ($registro->imagen) {
            Storage::disk('public')->delete($registro->imagen);
        }

        $registro->delete();

        return redirect()->back()->with('success', 'Registro eliminado');
    }
}
