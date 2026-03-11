<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tableestandare;
use Illuminate\Http\Request;

class EstandareController extends Controller
{
    public function index()
    {
        $data = Tableestandare::where('estado', 1)->get();
        return view('admin.estandare.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->merge([
            'services' => $request->services ? json_decode($request->services, true) : null,
            'service_menu' => $request->service_menu ? json_decode($request->service_menu, true) : null,
            'service_detalle_lista' => $request->service_detalle_lista ? json_decode($request->service_detalle_lista, true) : null,
            'features_items' => $request->features_items ? json_decode($request->features_items, true) : null,
        ]);


        $validated = $request->validate([
            // ABOUT
            'about_titulo' => 'nullable|string|max:255',
            'about_lista' => 'nullable|array',
            'about_lista.*' => 'nullable|string|max:255',

            // SERVICES
            'services' => 'nullable|array',
            'services.*.titulo' => 'required|string|max:255',
            'services.*.descripcion' => 'nullable|string',
            'services.*.icon' => 'nullable|string',
            'services.*.color' => 'nullable|string',

            // SERVICE MENU
            'service_menu' => 'nullable|array',
            'service_menu.*' => 'nullable|string|max:255',

            // SERVICE DETAIL LIST
            'service_detalle_lista' => 'nullable|array',
            'service_detalle_lista.*' => 'nullable|string|max:255',

            // FEATURES
            'features_items' => 'nullable|array',
            'features_items.*.titulo' => 'required|string|max:255',
            'features_items.*.icon' => 'nullable|string',
            'features_items.*.color' => 'nullable|string',
            'features_items.*.url' => 'nullable|url',

            // IMAGE
            'about_imagen' => 'nullable|image|max:2048',
        ]);

        // Imagen
        if ($request->hasFile('about_imagen')) {
            $name = time().'_'.$request->about_imagen->getClientOriginalName();
            $request->about_imagen->move(public_path('imagenes'), $name);
            $validated['about_imagen'] = $name;
        }

        $validated['estado'] = 1;

        Tableestandare::create($validated);

        return redirect()->route('estandare.index');
    }

    public function edit($id)
    {
        $edit = Tableestandare::findOrFail($id);
        $data = Tableestandare::where('estado',1)->get();

        return view('admin.estandare.index', compact('data','edit'));
    }

    public function update(Request $request, $id)
    {
        $estandar = Tableestandare::findOrFail($id);

        $request->merge([
            'services' => $request->services ? json_decode($request->services, true) : null,
            'service_menu' => $request->service_menu ? json_decode($request->service_menu, true) : null,
            'service_detalle_lista' => $request->service_detalle_lista ? json_decode($request->service_detalle_lista, true) : null,
            'features_items' => $request->features_items ? json_decode($request->features_items, true) : null,
        ]);


        $validated = $request->validate([
            'about_lista' => 'nullable|array',
            'about_lista.*' => 'nullable|string|max:255',

            'services' => 'nullable|array',
            'services.*.titulo' => 'required|string|max:255',

            'service_menu' => 'nullable|array',
            'service_menu.*' => 'nullable|string|max:255',

            'service_detalle_lista' => 'nullable|array',
            'service_detalle_lista.*' => 'nullable|string|max:255',

            'features_items' => 'nullable|array',
            'features_items.*.titulo' => 'required|string|max:255',

            'about_imagen' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('about_imagen')) {
            $name = time().'_'.$request->about_imagen->getClientOriginalName();
            $request->about_imagen->move(public_path('imagenes'), $name);
            $validated['about_imagen'] = $name;
        } else {
            $validated['about_imagen'] = $estandar->about_imagen;
        }

        $estandar->update($validated);

        return redirect()->route('estandare.index');
    }

    public function destroy($id)
    {
        Tableestandare::destroy($id);
        return redirect()->route('estandare.index');
    }
}
