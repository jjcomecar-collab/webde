<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\TableSquare;
use Illuminate\Http\Request;

class squareController extends Controller
{

public function index(Request $request)
{
    $squares = Tablesquare::orderBy('id','asc')->get();

    dd($squares);
}







    public function store(Request $request)
    {
        Tablesquare::create([
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
        return Tablesquare::findOrFail($id);
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

        return response()->json(['ok' => true]);
    }

    public function destroy($id)
    {
        Tablesquare::findOrFail($id)->delete();
        return response()->json(['ok' => true]);
    }
}

