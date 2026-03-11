<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TableService;
use Illuminate\Http\Request;

class TableServiceController extends Controller
{
    public function index($modulo)
    {
        $services = Tableservice::where('modulo',$modulo)
            ->where('estado',1)
            ->get();

        return view('admin.services.index', compact('services','modulo'));
    }

    public function store(Request $request, $modulo)
    {
        Tableservice::create([
            'modulo' => $modulo,
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'icono' => $request->icono,
            'color' => $request->color,
        ]);

        return back();
    }

    public function edit($modulo, Tableservice $service)
    {
        $services = Tableservice::where('modulo',$modulo)
            ->where('estado',1)
            ->get();

        return view('admin.services.index', compact('services','service','modulo'));
    }

    public function update(Request $request, $modulo, Tableservice $service)
    {
        $service->update([
            'modulo' => $modulo,
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'icono' => $request->icono,
            'color' => $request->color,
        ]);

        return redirect()->route('admin.services.index', $modulo);
    }

    public function destroy($modulo, Tableservice $service)
    {
        $service->update(['estado'=>0]);
        return back();
    }
}
