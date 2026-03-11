<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tablerunauto;
use Illuminate\Http\Request;

class runautoController extends Controller
{
    public function index()
    {
        $runautos = Tablerunauto::orderBy('orden')->get();
        return view('admin.runauto.index', compact('runautos'));
    }

    public function create()
    {
        return view('admin.runauto.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'nullable|string|max:255',
            'imagen' => 'required|image|mimes:png,jpg,jpeg,webp|max:2048',
            'orden'  => 'nullable|integer',
            'estado' => 'required|boolean',
        ]);

        // 📂 Ruta destino
        $folder = public_path('imagenes_runauto');

        // 🔐 Crear carpeta si no existe
        if (!file_exists($folder)) {
            mkdir($folder, 0777, true);
        }

        // 🖼 Nombre único
        $file = $request->file('imagen');
        $filename = time() . '_' . $file->getClientOriginalName();

        // 📥 Mover imagen
        $file->move($folder, $filename);

        // 💾 Guardar en BD
        Tablerunauto::create([
            'nombre' => $request->nombre,
            'imagen' => 'imagenes_runauto/' . $filename, // 🔥 esta ruta usarás en el blade
            'orden'  => $request->orden ?? 0,
            'estado' => $request->estado,
        ]);

        return redirect()->route('runauto.index')
            ->with('success', 'Logo guardado correctamente');
    }

    
    public function edit(Tablerunauto $runauto)
    {
        $runautos = Tablerunauto::orderBy('orden')->get();
        $editRunauto = $runauto;

        return view('admin.runauto.index', compact('runautos', 'editRunauto'));
    }


    public function update(Request $request, Tablerunauto $runauto)
    {
        $request->validate([
            'nombre' => 'nullable|string|max:255',
            'imagen' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
            'orden'  => 'nullable|integer',
            'estado' => 'required|boolean',
        ]);

        // 📦 Datos base (sin imagen)
        $data = [
            'nombre' => $request->nombre,
            'orden'  => $request->orden ?? 0,
            'estado' => $request->estado,
        ];

        // 🖼 Si se sube nueva imagen
        if ($request->hasFile('imagen')) {

            // 🗑 Eliminar imagen anterior
            if ($runauto->imagen && file_exists(public_path($runauto->imagen))) {
                unlink(public_path($runauto->imagen));
            }

            // 📂 Asegurar carpeta
            $folder = public_path('imagenes_runauto');
            if (!file_exists($folder)) {
                mkdir($folder, 0777, true);
            }

            // 💾 Guardar nueva imagen
            $file = $request->file('imagen');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move($folder, $filename);

            $data['imagen'] = 'imagenes_runauto/' . $filename;
        }

        // 🔄 Actualizar BD
        $runauto->update($data);

        return redirect()->route('runauto.index')
            ->with('success', 'Registro actualizado correctamente');
    }


    public function destroy(Tablerunauto $runauto)
    {
        $runauto->delete();

        return redirect()->route('runauto.index')
            ->with('success', 'Registro eliminado');
    }
}
