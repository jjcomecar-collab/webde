<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tablecirculo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CirculoController extends Controller
{
    public function index()
    {
        $circulos = Tablecirculo::where('estado', 1)
            ->orderBy('circulo', 'asc') // 👈 ORDEN POR CIRCULO
            ->orderBy('orden', 'asc')   // opcional (dentro del círculo)
            ->get();

        return view('admin.circulo.index', compact('circulos'));
    }

    


    public function store(Request $request)
    {
        $data = $request->validate([
            'circulo' => 'required|string|max:255',
            'nombre'  => 'required|string|max:255',
            'cargo'   => 'nullable|string|max:255',
            'orden'   => 'required|integer|min:1',
            'imagen'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            $nombreImagen = Str::uuid() . '.' . $request->imagen->extension();
            $request->imagen->move(public_path('imagenes'), $nombreImagen);
            $data['imagen'] = $nombreImagen;
        }

        $data['estado'] = 1;

        Tablecirculo::create($data);

        return redirect()->route('circulo.index')
            ->with('success', 'Integrante registrado correctamente');
    }

    public function edit($id)
    {
        $circuloEdit = Tablecirculo::findOrFail($id);

        $circulos = Tablecirculo::where('estado', 1)
            ->orderBy('circulo', 'asc')
            ->orderBy('orden', 'asc')
            ->get();

        return view('admin.circulo.index', compact('circulos', 'circuloEdit'));
    }

    public function update(Request $request, $id)
    {
        $circulo = Tablecirculo::findOrFail($id);

        $data = $request->validate([
            'circulo' => 'required|string|max:255',
            'nombre'  => 'required|string|max:255',
            'cargo'   => 'nullable|string|max:255',
            'orden'   => 'required|integer|min:1',
            'imagen'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            if ($circulo->imagen && file_exists(public_path('imagenes/' . $circulo->imagen))) {
                unlink(public_path('imagenes/' . $circulo->imagen));
            }

            $nombreImagen = Str::uuid() . '.' . $request->imagen->extension();
            $request->imagen->move(public_path('imagenes'), $nombreImagen);
            $data['imagen'] = $nombreImagen;
        }

        $circulo->update($data);

        return redirect()->route('circulo.index')
            ->with('success', 'Integrante actualizado correctamente');
    }

    public function destroy($id)
    {
        $circulo = Tablecirculo::findOrFail($id);

        $circulo->update([
            'estado' => 0
        ]);

        return redirect()->route('circulo.index')
            ->with('success', 'Integrante eliminado correctamente');
    }
}