<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tableacreditacion;
use Illuminate\Http\Request;

class AcreditacionController extends Controller
{
    public function index()
    {
        $acreditaciones = Tableacreditacion::where('estado', 1)->get();
        return view('admin.acreditacion.index', compact('acreditaciones'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        // Imagen ABOUT
        if ($request->hasFile('about_imagen')) {
            $name = time().'_about.'.$request->about_imagen->extension();
            $request->about_imagen->move(public_path('images'), $name);
            $data['about_imagen'] = 'images/'.$name;
        }

        // Imagen DETAIL
        if ($request->hasFile('detail_imagen')) {
            $name = time().'_detail.'.$request->detail_imagen->extension();
            $request->detail_imagen->move(public_path('images'), $name);
            $data['detail_imagen'] = 'images/'.$name;
        }

        $data['services'] = json_decode($request->services, true);
        $data['service_menu'] = json_decode($request->service_menu, true);

        Tableacreditacion::create($data);

        return redirect()->back()->with('success', 'Registro creado');
    }

    public function edit($id)
    {
        $item = Tableacreditacion::findOrFail($id);
        $acreditaciones = Tableacreditacion::where('estado', 1)->get();

        return view('admin.acreditacion.index', compact('item', 'acreditaciones'));
    }

    public function update(Request $request, $id)
    {
        $item = Tableacreditacion::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('about_imagen')) {
            $name = time().'_about.'.$request->about_imagen->extension();
            $request->about_imagen->move(public_path('images'), $name);
            $data['about_imagen'] = 'images/'.$name;
        }

        if ($request->hasFile('detail_imagen')) {
            $name = time().'_detail.'.$request->detail_imagen->extension();
            $request->detail_imagen->move(public_path('images'), $name);
            $data['detail_imagen'] = 'images/'.$name;
        }

        $data['services'] = json_decode($request->services, true);
        $data['service_menu'] = json_decode($request->service_menu, true);

        $item->update($data);

        return redirect()->route('acreditacion.index')->with('success', 'Actualizado');
    }

    public function destroy($id)
    {
        Tableacreditacion::where('id', $id)->update(['estado' => 0]);
        return redirect()->back()->with('success', 'Eliminado');
    }
}
