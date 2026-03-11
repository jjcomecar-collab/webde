<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tablehorario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function index()
    {
        $horarios = Tablehorario::where('estado', 1)->get();
        return view('admin.horario.index', compact('horarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'url' => 'required|url',
        ]);

        Tablehorario::create($request->all());

        return redirect()->route('horario.index')
            ->with('success', 'Horario registrado correctamente');
    }

    public function edit($id)
    {
        $horario = Tablehorario::findOrFail($id);
        $horarios = Tablehorario::where('estado', 1)->get();

        return view('admin.horario.index', compact('horario', 'horarios'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'url' => 'required|url',
        ]);

        $horario = Tablehorario::findOrFail($id);
        $horario->update($request->all());

        return redirect()->route('horario.index')
            ->with('success', 'Horario actualizado');
    }

    public function destroy($id)
    {
        $horario = Tablehorario::findOrFail($id);
        $horario->update(['estado' => 0]); // eliminación lógica

        return redirect()->route('horario.index')
            ->with('success', 'Horario eliminado');
    }
}
