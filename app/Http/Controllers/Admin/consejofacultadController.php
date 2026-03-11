<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tableconsejofacultad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ConsejofacultadController extends Controller
{
    public function index()
    {
        $items = Tableconsejofacultad::orderBy('id', 'desc')->get();
        $edit = null;

        return view('admin.consejofacultad.index', compact('items', 'edit'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        /* ===== IMAGEN ABOUT ===== */
        if ($request->hasFile('about_imagen')) {
            $name = time().'_about.'.$request->about_imagen->extension();
            $request->about_imagen->move(public_path('imagenes'), $name);
            $data['about_imagen'] = $name;
        }

        /* ===== IMAGEN DETALLE ===== */
        if ($request->hasFile('detalle_imagen')) {
            $name = time().'_detalle.'.$request->detalle_imagen->extension();
            $request->detalle_imagen->move(public_path('imagenes'), $name);
            $data['detalle_imagen'] = $name;
        }

        $data['estado'] = 1;

        Tableconsejofacultad::create($data);

        return redirect()->route('consejofacultad.index')->with('success', 'Registrado correctamente');
    }

    public function edit($id)
    {
        $edit = Tableconsejofacultad::findOrFail($id);
        $items = Tableconsejofacultad::orderBy('id', 'desc')->get();

        return view('admin.consejofacultad.index', compact('items', 'edit'));
    }

    public function update(Request $request, $id)
    {
        $item = Tableconsejofacultad::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('about_imagen')) {
            File::delete(public_path('imagenes/'.$item->about_imagen));
            $name = time().'_about.'.$request->about_imagen->extension();
            $request->about_imagen->move(public_path('imagenes'), $name);
            $data['about_imagen'] = $name;
        }

        if ($request->hasFile('detalle_imagen')) {
            File::delete(public_path('imagenes/'.$item->detalle_imagen));
            $name = time().'_detalle.'.$request->detalle_imagen->extension();
            $request->detalle_imagen->move(public_path('imagenes'), $name);
            $data['detalle_imagen'] = $name;
        }

        $item->update($data);

        return redirect()->route('consejofacultad.index')->with('success', 'Actualizado correctamente');
    }

    public function destroy($id)
    {
        $item = Tableconsejofacultad::findOrFail($id);

        File::delete(public_path('imagenes/'.$item->about_imagen));
        File::delete(public_path('imagenes/'.$item->detalle_imagen));

        $item->delete();

        return redirect()->route('consejofacultad.index')->with('success', 'Eliminado');
    }
}
