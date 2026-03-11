<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tabletramitecosto;
use Illuminate\Http\Request;

class TramitecostoController extends Controller
{
    public function index()
    {
        $items = Tabletramitecosto::where('estado', 1)
                    ->orderBy('order')
                    ->get();

        return view('admin.tramitecosto.index', compact('items'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('icon')) {
            $image = $request->file('icon');
            $name = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('imagenes'), $name);
            $data['icon'] = 'imagenes/'.$name;
        }

        Tabletramitecosto::create($data);

        return redirect()->back()->with('success', 'Registro creado');
    }

    public function edit($id)
    {
        $edit = Tabletramitecosto::findOrFail($id);
        $items = Tabletramitecosto::where('estado', 1)->get();

        return view('admin.tramitecosto.index', compact('items', 'edit'));
    }

    public function update(Request $request, $id)
    {
        $item = Tabletramitecosto::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('icon')) {
            $image = $request->file('icon');
            $name = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('imagenes'), $name);
            $data['icon'] = 'imagenes/'.$name;
        }

        $item->update($data);

        return redirect()->route('tramitecosto.index')->with('success', 'Registro actualizado');
    }

    public function destroy($id)
    {
        Tabletramitecosto::where('id', $id)->update(['estado' => 0]);

        return redirect()->back()->with('success', 'Registro eliminado');
    }
}
