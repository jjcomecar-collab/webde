<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TableSquare;
use Illuminate\Http\Request;

class SquareController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $squares = TableSquare::orderBy('id', 'asc')->get();

            return response()->json([
                'data' => $squares
            ]);
        }

        return view('admin.square.index');
    }

    public function store(Request $request)
    {
        TableSquare::create([
            'title'       => $request->title,
            'icon'        => $request->icon,
            'color_class' => $request->color_class,
            'url'         => $request->url,
            'aos_delay'   => $request->aos_delay ?? 100,
            'estado'      => 1
        ]);

        return response()->json(['ok' => true]);
    }

    public function edit($id)
    {
        return TableSquare::findOrFail($id);
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

        return response()->json(['ok' => true]);
    }

    public function destroy($id)
    {
        TableSquare::findOrFail($id)->delete();

        return response()->json(['ok' => true]);
    }
}