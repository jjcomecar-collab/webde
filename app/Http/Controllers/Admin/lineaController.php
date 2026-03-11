<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tablelinea;
use Illuminate\Http\Request;

class LineaController extends Controller
{
    public function index()
    {
        $lineas = Tablelinea::where('estado', 1)->get();
        return view('admin.linea.index', compact('lineas'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        // 📸 Imagen SIN storage
        if ($request->hasFile('about_imagen')) {
            $file = $request->file('about_imagen');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('imagenes'), $filename);
            $data['about_imagen'] = $filename;
        }

        // 🧩 Services (JSON)
        $data['services'] = json_decode($request->services, true);
        $data['estado'] = 1;

        Tablelinea::create($data);

        return redirect()->back()->with('success', 'Registro creado');
    }

    public function edit($id)
    {
        $linea = Tablelinea::findOrFail($id);
        $lineas = Tablelinea::where('estado', 1)->get();

        return view('admin.linea.index', compact('linea', 'lineas'));
    }

    public function update(Request $request, $id)
    {
        $linea = Tablelinea::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('about_imagen')) {
            $file = $request->file('about_imagen');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('imagenes'), $filename);
            $data['about_imagen'] = $filename;
        }

        $data['services'] = json_decode($request->services, true);

        $linea->update($data);

        return redirect()->route('linea.index')->with('success', 'Registro actualizado');
    }

    public function destroy($id)
    {
        $linea = Tablelinea::findOrFail($id);
        $linea->delete();

        return redirect()->back()->with('success', 'Registro eliminado');
    }
}
