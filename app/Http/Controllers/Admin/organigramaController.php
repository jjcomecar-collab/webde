<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tableorganigrama;
use Illuminate\Http\Request;

class organigramaController extends Controller
{
    public function index()
    {
        $organigramas = Tableorganigrama::orderBy('id', 'desc')->get();
        return view('admin.organigrama.index', compact('organigramas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $name = time().'.'.$request->image->extension();
            $request->image->move(public_path('imagenes_organigramas'), $name);
            $data['image'] = $name;
        }

        Tableorganigrama::create($data);

        return redirect()->back()->with('success', 'Organigrama creado');
    }

    public function edit($id)
    {
        $organigrama = Tableorganigrama::findOrFail($id);
        $organigramas = Tableorganigrama::orderBy('id', 'desc')->get();

        return view('admin.organigrama.index', compact('organigrama','organigramas'));
    }

    public function update(Request $request, $id)
    {
        $organigrama = Tableorganigrama::findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $name = time().'.'.$request->image->extension();
            $request->image->move(public_path('imagenes_organigramas'), $name);
            $data['image'] = $name;
        }

        $organigrama->update($data);

        return redirect()->route('organigrama.index')->with('success', 'Organigrama actualizado');
    }

    public function destroy($id)
    {
        Tableorganigrama::destroy($id);
        return redirect()->back()->with('success', 'Organigrama eliminado');
    }
}
