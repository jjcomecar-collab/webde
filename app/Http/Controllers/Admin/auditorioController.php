<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tableauditorio;
use Illuminate\Http\Request;

class AuditorioController extends Controller
{
    public function index()
    {
        $auditorios = TableAuditorio::where('estado', 1)->get();
        return view('admin.auditorio.index', compact('auditorios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image'
        ]);

        $nombreImagen = time() . '.' . $request->image->extension();
        $request->image->move(public_path('imagenes_auditorios'), $nombreImagen);

        TableAuditorio::create([
            'title' => $request->title,
            'image' => 'imagenes_auditorios/' . $nombreImagen,
        ]);

        return redirect()->back()->with('success', 'Auditorio creado');
    }

    public function edit($id)
    {
        $auditorio = TableAuditorio::findOrFail($id);
        $auditorios = TableAuditorio::where('estado', 1)->get();

        return view('admin.auditorio.index', compact('auditorio', 'auditorios'));
    }

    public function update(Request $request, $id)
    {
        $auditorio = TableAuditorio::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image'
        ]);

        $data = ['title' => $request->title];

        if ($request->hasFile('image')) {
            $nombreImagen = time() . '.' . $request->image->extension();
            $request->image->move(public_path('imagenes_auditorios'), $nombreImagen);
            $data['image'] = 'imagenes_auditorios/' . $nombreImagen;
        }

        $auditorio->update($data);

        return redirect()->route('auditorio.index')->with('success', 'Auditorio actualizado');
    }

    public function destroy($id)
    {
        TableAuditorio::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Auditorio eliminado');
    }
}
