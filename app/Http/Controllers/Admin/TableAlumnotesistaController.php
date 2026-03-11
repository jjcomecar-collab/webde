<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TableAlumnotesista;
use Illuminate\Http\Request;

class TableAlumnotesistaController extends Controller
{
    /* ===============================
       LISTADO
    =============================== */
    public function index($modulo)
    {
        $items = TableAlumnotesista::where('modulo', $modulo)
            ->orderBy('estado', 'desc') // activos primero
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.alumnotesistas.index', compact('items', 'modulo'));
    }

    /* ===============================
       GUARDAR
    =============================== */
    public function store(Request $request, $modulo)
    {
        $data = $request->all();
        $data['modulo'] = $modulo;
        $data['estado'] = 1;

        if ($request->hasFile('foto')) {
            $imagen = $request->file('foto');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->move(public_path('imagenes'), $nombreImagen);
            $data['foto'] = $nombreImagen;
        }

        TableAlumnotesista::create($data);

        return redirect()
            ->route('admin.alumnotesistas.index', $modulo)
            ->with('success', 'Registro creado correctamente');
    }

    /* ===============================
       EDITAR
    =============================== */
    public function edit($modulo, TableAlumnotesista $alumnotesista)
    {
        $items = TableAlumnotesista::where('modulo', $modulo)
            ->orderBy('estado', 'desc')
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.alumnotesistas.index', [
            'items'  => $items,
            'edit'   => $alumnotesista,
            'modulo' => $modulo
        ]);
    }

    /* ===============================
       ACTUALIZAR
    =============================== */
    public function update(Request $request, $modulo, TableAlumnotesista $alumnotesista)
    {
        $data = $request->all();

        if ($request->hasFile('foto')) {

            if (
                $alumnotesista->foto &&
                file_exists(public_path('imagenes/' . $alumnotesista->foto))
            ) {
                unlink(public_path('imagenes/' . $alumnotesista->foto));
            }

            $imagen = $request->file('foto');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->move(public_path('imagenes'), $nombreImagen);
            $data['foto'] = $nombreImagen;
        }

        $alumnotesista->update($data);

        return redirect()
            ->route('admin.alumnotesistas.index', $modulo)
            ->with('success', 'Registro actualizado correctamente');
    }

    /* ===============================
       ELIMINADO LÓGICO
    =============================== */
    public function destroy($modulo, TableAlumnotesista $alumnotesista)
    {
        $alumnotesista->estado = 0;
        $alumnotesista->save();

        return redirect()
            ->route('admin.alumnotesistas.index', $modulo)
            ->with('success', 'Registro eliminado');
    }

    /* ===============================
       RESTAURAR
    =============================== */
    public function restore($modulo, $id)
    {
        $alumnotesista = TableAlumnotesista::findOrFail($id);
        $alumnotesista->estado = 1;
        $alumnotesista->save();

        return redirect()
            ->route('admin.alumnotesistas.index', $modulo)
            ->with('success', 'Registro restaurado');
    }
}
