<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tableautoridade;
use Illuminate\Http\Request;

class AutoridadeController extends Controller
{
    public function index()
    {
        $autoridades = Tableautoridade::orderBy('orden')->get();
        return view('admin.autoridades.index', compact('autoridades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cargo'  => 'required',
            'nombre' => 'required',
            'email'  => 'nullable|email',
            'imagen' => 'nullable|image'
        ]);

        $data = $request->all();

        if ($request->hasFile('imagen')) {
            $name = time().'.'.$request->imagen->extension();
            $request->imagen->move(public_path('imagenes_autoridades'), $name);
            $data['imagen'] = $name;
        }

        Tableautoridade::create($data);

        return redirect()->back()->with('success', 'Autoridad creada correctamente');
    }

    public function edit($id)
    {
        $autoridad  = Tableautoridade::findOrFail($id);
        $autoridades = Tableautoridade::orderBy('orden')->get();

        return view('admin.autoridades.index', compact('autoridad','autoridades'));
    }

    public function update(Request $request, $id)
    {
        $autoridad = Tableautoridade::findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('imagen')) {
            $name = time().'.'.$request->imagen->extension();
            $request->imagen->move(public_path('imagenes_autoridades'), $name);
            $data['imagen'] = $name;
        }

        $autoridad->update($data);

        return redirect()->route('autoridade.index')
            ->with('success', 'Autoridad actualizada');
    }

    public function destroy($id)
    {
        Tableautoridade::destroy($id);

        return redirect()->back()->with('success', 'Autoridad eliminada');
    }
}
