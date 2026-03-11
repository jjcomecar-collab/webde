<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tableresponsocial;
use Illuminate\Http\Request;

class ResponsocialController extends Controller
{
    public function index()
    {
        $items = Tableresponsocial::where('estado', 1)->get();
        return view('admin.responsocial.index', compact('items'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        // Imagen (public/imágenes)
        if ($request->hasFile('image')) {
            $name = time().'.'.$request->image->extension();
            $request->image->move(public_path('imágenes'), $name);
            $data['image'] = $name;
        }

        $data['list_items'] = array_filter($request->list_items ?? []);

        Tableresponsocial::create($data);

        return back()->with('success', 'Registro creado correctamente');
    }

    public function edit($id)
    {
        $item = Tableresponsocial::findOrFail($id);
        $items = Tableresponsocial::where('estado', 1)->get();

        return view('admin.responsocial.index', compact('item', 'items'));
    }

    public function update(Request $request, $id)
    {
        $item = Tableresponsocial::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image')) {
            $name = time().'.'.$request->image->extension();
            $request->image->move(public_path('imágenes'), $name);
            $data['image'] = $name;
        }

        $data['list_items'] = array_filter($request->list_items ?? []);

        $item->update($data);

        return redirect()->route('responsocial.index')
            ->with('success', 'Registro actualizado');
    }

    public function destroy($id)
    {
        // Eliminación lógica
        Tableresponsocial::where('id', $id)->update(['estado' => 0]);
        return back()->with('success', 'Registro eliminado');
    }
}
