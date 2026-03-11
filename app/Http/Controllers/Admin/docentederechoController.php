<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TableDocenteDerecho;
use Illuminate\Http\Request;

class DocenteDerechoController extends Controller
{
    public function index()
    {
        $docentes = TableDocenteDerecho::orderBy('orden')->get();
        return view('admin.docentederecho.index', compact('docentes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'tipo'   => 'required',
            'imagen' => 'nullable|image'
        ]);

        $data = $request->all();

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('imagenes_auditorios'), $name);
            $data['imagen'] = $name;
        }

        TableDocenteDerecho::create($data);

        return redirect()->back()->with('success', 'Docente registrado');
    }

    public function edit($id)
    {
        $docente = TableDocenteDerecho::findOrFail($id);
        $docentes = TableDocenteDerecho::orderBy('orden')->get();

        return view('admin.docentederecho.index', compact('docente', 'docentes'));
    }

    public function update(Request $request, $id)
    {
        $docente = TableDocenteDerecho::findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('imagenes_auditorios'), $name);
            $data['imagen'] = $name;
        }

        $docente->update($data);

        return redirect()->route('docentederecho.index')
            ->with('success', 'Docente actualizado');
    }

    public function destroy($id)
    {
        TableDocenteDerecho::destroy($id);
        return redirect()->back()->with('success', 'Docente eliminado');
    }
}
