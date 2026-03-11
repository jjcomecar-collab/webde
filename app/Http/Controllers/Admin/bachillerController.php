<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tablebachiller;
use Illuminate\Http\Request;



class BachillerController extends Controller
{
    public function index()
    {
        $bachillers = Tablebachiller::where('estado', 1)->get();
        $edit = null;

        return view('admin.bachiller.index', compact('bachillers', 'edit'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'icono' => 'required',
            'color' => 'required',
            'url' => 'required',
        ]);

        Tablebachiller::create($request->all());

        return redirect()->route('bachiller.index')
            ->with('success', 'Registro creado correctamente');
    }

    public function edit($id)
    {
        $bachillers = Tablebachiller::where('estado', 1)->get();
        $edit = Tablebachiller::findOrFail($id);

        return view('admin.bachiller.index', compact('bachillers', 'edit'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'icono' => 'required',
            'color' => 'required',
            'url' => 'required',
        ]);

        $bachiller = Tablebachiller::findOrFail($id);
        $bachiller->update($request->all());

        return redirect()->route('bachiller.index')
            ->with('success', 'Registro actualizado');
    }

    public function destroy($id)
    {
        $bachiller = Tablebachiller::findOrFail($id);
        $bachiller->estado = 0;
        $bachiller->save();

        return redirect()->route('bachiller.index')
            ->with('success', 'Registro eliminado');
    }
}
