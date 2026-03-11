<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tablehistoria;
use Illuminate\Http\Request;

class HistoriaController extends Controller
{
    public function index()
    {
        $historias = Tablehistoria::orderBy('id', 'desc')->get();
        return view('admin.historia.index', compact('historias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'paragraph_1' => 'required',
            'image' => 'nullable|image'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('imagenes_historias'), $imageName);
            $data['image'] = $imageName;
        }

        Tablehistoria::create($data);

        return redirect()->back()->with('success','Historia creada');
    }

    public function edit($id)
    {
        $historia = Tablehistoria::findOrFail($id);
        $historias = Tablehistoria::orderBy('id','desc')->get();

        return view('admin.historia.index', compact('historia','historias'));
    }

    public function update(Request $request, $id)
    {
        $historia = Tablehistoria::findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('imagenes_historias'), $imageName);
            $data['image'] = $imageName;
        }

        $historia->update($data);

        return redirect()->route('historia.index')->with('success','Historia actualizada');
    }

    public function destroy($id)
    {
        Tablehistoria::destroy($id);
        return redirect()->back()->with('success','Historia eliminada');
    }
}
