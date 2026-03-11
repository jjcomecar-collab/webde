<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Tablecarrusel;
use Illuminate\Http\Request;




class carruselController extends Controller
{
    public function index()
    {
        $tablecarrusel = Tablecarrusel::all(); // obtienes todos los registros

        return view('admin.carrusel.index', compact('tablecarrusel'));   
    }

 

    public function create()
    {
        return view('admin/carrusel.create');
    }

 
    
    public function store(Request $request)
{
    $request->validate([
        'imagen' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $file = $request->file('imagen');
    $filename = time().'_'.$file->getClientOriginalName();
    $file->move(public_path('imagenes_carrusel'), $filename);

    $carrusel = Tablecarrusel::create([
        'imagen' => 'imagenes_carrusel/'.$filename,
        'estado' => 1
    ]);

    return response()->json([
        'success' => true,
        'data' => $carrusel
    ]);
}




    
    public function edit(Tablecarrusel $p_carrusel_edit)
    {
        return view('admin/carrusel.edit', compact('p_carrusel_edit'));
    }


    
 
    public function update(Request $request, Tablecarrusel $carrusel)
{
    if ($request->hasFile('imagen')) {
        if ($carrusel->imagen && file_exists(public_path($carrusel->imagen))) {
            unlink(public_path($carrusel->imagen));
        }

        $file = $request->file('imagen');
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('imagenes_carrusel'), $filename);

        $carrusel->imagen = 'imagenes_carrusel/'.$filename;
    }

    $carrusel->save();

    return response()->json([
        'success' => true,
        'data' => $carrusel
    ]);
}







    
public function destroy($id)
{
    $carrusel = Tablecarrusel::findOrFail($id);

    $carrusel->estado = $carrusel->estado == 1 ? 0 : 1;
    $carrusel->save();

    return response()->json([
        'success' => true,
        'estado' => $carrusel->estado
    ]);
}



}
