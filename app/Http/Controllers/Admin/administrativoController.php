<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tableadministrativo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class administrativoController extends Controller
{
    public function index()
    {
        $administrativos = Tableadministrativo::where('estado', 1)
            ->orderBy('orden')
            ->get();

        return view('admin.administrativos.index', compact('administrativos'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'cargo'  => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'email'  => 'nullable|email',
            'orden'  => 'nullable|integer',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('imagenes_administrativos'), $name);
            $data['imagen'] = $name;
        }

        Tableadministrativo::create($data);

        return redirect()->back()->with('success', 'Registrado correctamente');
    }

    public function update(Request $request, $id)
    {
        $item = Tableadministrativo::findOrFail($id);

        $data = $request->validate([
            'cargo'  => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'email'  => 'nullable|email',
            'orden'  => 'nullable|integer',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        if ($request->hasFile('imagen')) {

            if ($item->imagen && File::exists(public_path('imagenes_administrativos/'.$item->imagen))) {
                File::delete(public_path('imagenes_administrativos/'.$item->imagen));
            }

            $file = $request->file('imagen');
            $name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('imagenes_administrativos'), $name);
            $data['imagen'] = $name;
        }

        $item->update($data);

        return redirect()->back()->with('success', 'Actualizado correctamente');
    }

    public function destroy($id)
    {
        $item = Tableadministrativo::findOrFail($id);
        $item->estado = 0;
        $item->save();

        return redirect()->back()->with('success', 'Eliminado correctamente');
    }
}
