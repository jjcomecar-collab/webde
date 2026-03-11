<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tablenormatividad;
use Illuminate\Http\Request;

class NormatividadController extends Controller
{
    public function index()
    {
        $normatividades = Tablenormatividad::where('estado',1)->get();
        return view('admin.normatividad.index', compact('normatividades'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        // Imagen (SIN storage)
        if ($request->hasFile('icono')) {
            $file = $request->file('icono');
            $name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('imagenes'), $name);
            $data['icono'] = 'imagenes/'.$name;
        }

        // items como JSON
        if ($request->tipo === 'lista') {
            $data['items'] = array_filter($request->items);
        }

        Tablenormatividad::create($data);

        return redirect()->back()->with('success','Registrado correctamente');
    }

    public function edit($id)
    {
        $norma = Tablenormatividad::findOrFail($id);
        return response()->json($norma);
    }

public function update(Request $request, $id)
{
    $normatividad = Tablenormatividad::findOrFail($id);

    $data = $request->except(['_token','_method']);

    // IMAGEN OPCIONAL
    if ($request->hasFile('icono')) {

        $file = $request->file('icono');
        $name = time().'_'.$file->getClientOriginalName();

        // GUARDA EN public/imagenes
        $file->move(public_path('imagenes'), $name);

        // GUARDAMOS RUTA COMPLETA
        $data['icono'] = 'imagenes/'.$name;
    }

    // LISTA → JSON
    if ($request->tipo === 'lista') {
        $data['items'] = array_filter($request->items ?? []);
    }

    $normatividad->update($data);

    return redirect()->back()->with('success', 'Registro actualizado correctamente');
}




    public function destroy($id)
    {
        Tablenormatividad::where('id',$id)->update(['estado'=>0]);
        return redirect()->back()->with('success','Eliminado');
    }
}
