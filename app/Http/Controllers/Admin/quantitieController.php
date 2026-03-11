<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tablequantitie;
use Illuminate\Http\Request;

class quantitieController extends Controller
{
    public function index()
    {
        $quantities = Tablequantitie::all();
        return view('admin.quantities.index', compact('quantities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo'   => 'required|string|max:255',
            'cantidad' => 'required|integer',
            'icono'    => 'required|string',
            'duracion' => 'required|integer',
        ]);

        Tablequantitie::create($request->all());

        return redirect()->back()->with('success', 'Registro creado correctamente');
    }

    public function edit($id)
    {
        $quantity = Tablequantitie::findOrFail($id);
        $quantities = Tablequantitie::all();

        return view('admin.quantities.index', compact('quantity', 'quantities'));
    }

    public function update(Request $request, $id)
    {
        $quantity = Tablequantitie::findOrFail($id);

        $request->validate([
            'titulo'   => 'required',
            'cantidad' => 'required|integer',
            'icono'    => 'required',
            'duracion' => 'required|integer',
        ]);

        $quantity->update($request->all());

        return redirect()->route('quantitie.index')
            ->with('success', 'Registro actualizado');
    }

    public function destroy($id)
    {
        Tablequantitie::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Registro eliminado');
    }
}
