<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TableFeature;
use Illuminate\Http\Request;

class TableFeatureController extends Controller
{
    public function index($modulo)
    {
        $features = Tablefeature::where('modulo',$modulo)
            ->where('estado',1)
            ->get();

       

        return view('admin.features.index', compact('features','modulo'));
    }

    public function store(Request $request, $modulo)
    {
        Tablefeature::create([
            'modulo' => $modulo,
            'titulo' => $request->titulo,
            'url' => $request->url,
            'icono' => $request->icono,
            'color' => $request->color,
        ]);

        return back();
    }

    public function edit($modulo, Tablefeature $feature)
    {
        $features = Tablefeature::where('modulo',$modulo)
            ->where('estado',1)
            ->get();

        return view('admin.features.index', compact('features','feature','modulo'));
    }

    public function update(Request $request, $modulo, Tablefeature $feature)
    {
        $feature->update([
            'modulo' => $modulo,
            'titulo' => $request->titulo,
            'url' => $request->url,
            'icono' => $request->icono,
            'color' => $request->color,
        ]);

        return redirect()->route('admin.features.index', $modulo);
    }

    public function destroy($modulo, Tablefeature $feature)
    {
        $feature->update(['estado'=>0]);
        return back();
    }
}
