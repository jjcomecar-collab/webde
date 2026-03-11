<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Tablewelcome;
use Illuminate\Http\Request;

class welcomeController extends Controller
{
    public function index()
    {
        $welcomes = Tablewelcome::orderBy('id', 'desc')->get();
        return view('admin.welcome.index', compact('welcomes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
        ]);

        Tablewelcome::create([
            'title' => $request->title,
            'description' => $request->description,
            'estado' => 1,
        ]);

        return redirect()->route('welcome.index')
            ->with('success', 'Bienvenida creada correctamente');
    }

    public function update(Request $request, Tablewelcome $welcome)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
        ]);

        $welcome->update([
            'title' => $request->title,
            'description' => $request->description,
            'estado' => $request->estado,
        ]);

        return redirect()->route('welcome.index')
            ->with('success', 'Bienvenida actualizada');
    }

    public function destroy(Tablewelcome $welcome)
    {
        $welcome->update([
            'estado' => 0
        ]);

        return redirect()->route('welcome.index')
            ->with('success', 'Bienvenida desactivada correctamente');
    }


}

