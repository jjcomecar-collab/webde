<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TableSquare;
use Illuminate\Http\Request;

class SquareController extends Controller
{
    public function index()
    {
        $squares = TableSquare::orderBy('id', 'asc')->get();
        return view('admin.square.index', compact('squares'));
    }

    public function store(Request $request)
    {
        TableSquare::create([
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
        $square = TableSquare::findOrFail($id);

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
        $square = TableSquare::findOrFail($id);
        $square->delete();

        return redirect()->route('square.index')->with('success', 'Square eliminado correctamente');
    }
}