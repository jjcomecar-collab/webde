<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tablesquare;
use Illuminate\Http\Request;

class squareController extends Controller
{
    public function index()
    {
        $squares = Tablesquare::orderBy('id', 'asc')->get();
        return view('admin.square.index', compact('squares'));
    }

    public function store(Request $request)
    {
        Tablesquare::create([
            'title'       => $request->title,
            'icon'        => $request->icon,
            'color_class' => $request->color_class,
            'url'         => $request->url,
            'aos_delay'   => $request->aos_delay,
            'estado'      => 1
        ]);

        return redirect()->route('square.index')->with('success', 'Square creado correctamente');
    }

    public function update(Request $request, $id)
    {
        $square = Tablesquare::findOrFail($id);

        $square->update([
            'title'       => $request->title,
            'icon'        => $request->icon,
            'color_class' => $request->color_class,
            'url'         => $request->url,
            'aos_delay'   => $request->aos_delay
        ]);

        return redirect()->route('square.index')->with('success', 'Square actualizado correctamente');
    }

    public function destroy($id)
    {
        $square = Tablesquare::findOrFail($id);
        $square->delete();

        return redirect()->route('square.index')->with('success', 'Square eliminado correctamente');
    }
}