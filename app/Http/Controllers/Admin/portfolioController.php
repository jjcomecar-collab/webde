<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tableportfolio;


class portfolioController extends Controller
{

    public function index()
    {
        $items = Tableportfolio::all();

        return view('admin/portfolio.index', ['portfolioindex' => $items]);
    }


    
    public function create()
    {
        return view('admin/portfolio/create');
    }




    
    public function store(Request $request)
    {
         $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'imagen' => 'required|image|mimes:jpg,jpeg,png',
            'categoria' => 'required|in:noticia,evento,onomastico',
        ]);

        // Subir imagen
        $filename = time().'_'.$request->imagen->getClientOriginalName();
        $request->imagen->move(public_path('imagenes_portfolio'), $filename);

        Tableportfolio::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $filename,
            'categoria' => $request->categoria,
            'estado' => 1,
        ]);

        return redirect()->route('portafolio.index')->with('success', 'Registro creado');
    }



    
    public function edit(Tableportfolio $p_portfolio_edit)
    {
        return view('admin/portfolio/edit', compact('p_portfolio_edit'));
    }


    
    public function update(Request $request, $id)
    {
        $tableportfolio = Tableportfolio::findOrFail($id);

        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png',
            'categoria' => 'required|in:noticia,evento,onomastico',
        ]);

        if ($request->hasFile('imagen')) {
            $filename = time().'_'.$request->imagen->getClientOriginalName();
            $request->imagen->move(public_path('imagenes_portfolio'), $filename);
            $tableportfolio->imagen = $filename;
        }

        $tableportfolio->update([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'categoria' => $request->categoria,
            'estado' => $request->estado ?? 1,
        ]);

        return redirect()->route('portafolio.index')->with('success', 'Registro actualizado');
    }

    


    
    public function destroy($id)
    {
        $portfolio = Tableportfolio::findOrFail($id);
        $message = '';

        if ($portfolio->estado == 1) {
            // Cambiar estado a 0 (inactivo / eliminado lógico)
             Tableportfolio::where('id', $portfolio->id)
                ->update([
                    'estado' => 0
                ]);

            $message = 'Imagen eliminada';
        } else {
            // Restaurar (estado = 1)
            Tableportfolio::where('id', $portfolio->id)
                ->update([
                    'estado' => 1
                ]);

            $message = 'Imagen restaurada';
        }


        return redirect()->route('portafolio.index')->with('success', $message);
    }
}
