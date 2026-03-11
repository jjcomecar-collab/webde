<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tabledepartamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DepartamentoController extends Controller
{
    public function index()
    {
        $departamentos = Tabledepartamento::where('estado', 1)->get();
        $edit = null;

        return view('admin.departamento.index', compact('departamentos', 'edit'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        // Imagen
        if ($request->hasFile('imagen')) {
            $img = time().'.'.$request->imagen->extension();
            $request->imagen->move(public_path('imagenes'), $img);
            $data['imagen'] = $img;
        }

        // JSON
        $data['funciones'] = array_values(array_filter($request->funciones ?? []));
        $data['planes'] = $request->planes ?? [];

        Tabledirectorio:
        Tabledepartamento::create($data);

        return redirect()->route('departamento.index')->with('success', 'Registro creado');
    }

    public function edit($id)
    {
        $departamentos = Tabledepartamento::where('estado', 1)->get();
        $edit = Tabledepartamento::findOrFail($id);

        return view('admin.departamento.index', compact('departamentos', 'edit'));
    }

    public function update(Request $request, $id)
    {
        $departamento = Tabledepartamento::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('imagen')) {
            if ($departamento->imagen && File::exists(public_path('imagenes/'.$departamento->imagen))) {
                File::delete(public_path('imagenes/'.$departamento->imagen));
            }

            $img = time().'.'.$request->imagen->extension();
            $request->imagen->move(public_path('imagenes'), $img);
            $data['imagen'] = $img;
        }

        $data['funciones'] = array_values(array_filter($request->funciones ?? []));
        $data['planes'] = $request->planes ?? [];

        $departamento->update($data);

        return redirect()->route('departamento.index')->with('success', 'Registro actualizado');
    }

    public function destroy($id)
    {
        $d = Tabledepartamento::findOrFail($id);
        $d->estado = 0;
        $d->save();

        return redirect()->route('departamento.index')->with('success', 'Registro eliminado');
    }
}
