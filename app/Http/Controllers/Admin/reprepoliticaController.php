<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tablereprepolitica;
use Illuminate\Http\Request;

class ReprepoliticaController extends Controller
{
    public function index()
    {
        $items = Tablereprepolitica::where('estado', 1)->get();
        return view('admin.reprepolitica.index', compact('items'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $name = time().'.'.$request->image->extension();
            $request->image->move(public_path('imagenes'), $name);
            $data['image'] = $name;
        }

        $data['list_items'] = array_filter($request->list_items ?? []);

        Tablereprepolitica::create($data);

        return back()->with('success', 'Registro creado');
    }

    public function edit($id)
    {
        $item = Tablereprepolitica::findOrFail($id);
        $items = Tablereprepolitica::where('estado', 1)->get();

        return view('admin.reprepolitica.index', compact('item', 'items'));
    }

    public function update(Request $request, $id)
    {
        $item = Tablereprepolitica::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image')) {
            $name = time().'.'.$request->image->extension();
            $request->image->move(public_path('imagenes'), $name);
            $data['image'] = $name;
        }

        $data['list_items'] = array_filter($request->list_items ?? []);

        $item->update($data);

        return redirect()->route('reprepolitica.index')
            ->with('success', 'Registro actualizado');
    }

    public function destroy($id)
    {
        Tablereprepolitica::where('id', $id)->update(['estado' => 0]);
        return back()->with('success', 'Registro eliminado');
    }
}
