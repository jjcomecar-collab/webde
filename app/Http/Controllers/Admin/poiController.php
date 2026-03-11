<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tablepoi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PoiController extends Controller
{
    public function index()
    {
        $pois = Tablepoi::where('estado', 1)->get();
        return view('admin.poi.index', compact('pois'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        // MENU (textarea → array)
        $data['menu'] = $request->menu ? array_filter(explode("\n", $request->menu)) : null;

        // LISTA
        $data['lista'] = $request->lista ? array_filter(explode("\n", $request->lista)) : null;

        // IMAGEN
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('imagenes'), $name);
            $data['imagen'] = $name;
        }

        Tablepoi::create($data);

        return redirect()->back()->with('success', 'Registro creado correctamente');
    }

    public function edit($id)
    {
        $poi = Tablepoi::findOrFail($id);
        $pois = Tablepoi::where('estado', 1)->get();

        return view('admin.poi.index', compact('poi', 'pois'));
    }

    public function update(Request $request, $id)
    {
        $poi = Tablepoi::findOrFail($id);
        $data = $request->all();

        $data['menu'] = $request->menu ? array_filter(explode("\n", $request->menu)) : null;
        $data['lista'] = $request->lista ? array_filter(explode("\n", $request->lista)) : null;

        if ($request->hasFile('imagen')) {
            if ($poi->imagen && File::exists(public_path('imagenes/'.$poi->imagen))) {
                File::delete(public_path('imagenes/'.$poi->imagen));
            }

            $file = $request->file('imagen');
            $name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('imagenes'), $name);
            $data['imagen'] = $name;
        }

        $poi->update($data);

        return redirect()->route('poi.index')->with('success', 'Registro actualizado');
    }

    public function destroy($id)
    {
        $poi = Tablepoi::findOrFail($id);

        if ($poi->imagen && File::exists(public_path('imagenes/'.$poi->imagen))) {
            File::delete(public_path('imagenes/'.$poi->imagen));
        }

        $poi->delete();

        return redirect()->back()->with('success', 'Registro eliminado');
    }
}
