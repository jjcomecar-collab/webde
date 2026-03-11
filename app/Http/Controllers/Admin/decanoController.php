<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TableDecano;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DecanoController extends Controller
{
    public function index()
    {
        $decanos = TableDecano::orderBy('orden')->get();
        return view('admin.decano.index', compact('decanos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cargo'  => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'imagen' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('imagenes_decano'), $name);
            $data['imagen'] = $name;
        }

        TableDecano::create($data);

        return redirect()->back()->with('success', 'Decano registrado correctamente');
    }

    public function edit($id)
    {
        $decano = TableDecano::findOrFail($id);
        $decanos = TableDecano::orderBy('orden')->get();

        return view('admin.decano.index', compact('decano', 'decanos'));
    }

    public function update(Request $request, $id)
    {
        $decano = TableDecano::findOrFail($id);

        $request->validate([
            'cargo'  => 'required',
            'nombre' => 'required',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('imagen')) {
            $old = public_path('imagenes_decano/'.$decano->imagen);
            if (File::exists($old)) {
                File::delete($old);
            }

            $file = $request->file('imagen');
            $name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('imagenes_decano'), $name);
            $data['imagen'] = $name;
        }

        $decano->update($data);

        return redirect()->route('decano.index')
            ->with('success', 'Decano actualizado');
    }

    public function destroy($id)
    {
        $decano = TableDecano::findOrFail($id);

        $img = public_path('imagenes_decano/'.$decano->imagen);
        if (File::exists($img)) {
            File::delete($img);
        }

        $decano->delete();

        return redirect()->back()->with('success', 'Registro eliminado');
    }
}
