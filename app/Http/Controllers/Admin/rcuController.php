<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TableRcu;
use Illuminate\Http\Request;

class RcuController extends Controller
{
    public function index()
    {
        $rcus = TableRcu::where('estado', 1)->orderBy('id','desc')->get();
        return view('admin.rcu.index', compact('rcus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required',
            'description'   => 'required',
            'download_link' => 'required|url',
            'icon'          => 'nullable'
        ]);

        TableRcu::create([
            'title'         => $request->title,
            'description'   => $request->description,
            'download_link' => $request->download_link,
            'icon'          => $request->icon ?? 'bi bi-download',
        ]);

        return redirect()->back()->with('success','RCU creada correctamente');
    }

    public function edit($id)
    {
        $rcu  = TableRcu::findOrFail($id);
        $rcus = TableRcu::where('estado', 1)->get();

        return view('admin.rcu.index', compact('rcu','rcus'));
    }

    public function update(Request $request, $id)
    {
        $rcu = TableRcu::findOrFail($id);

        $request->validate([
            'title'         => 'required',
            'description'   => 'required',
            'download_link' => 'required|url',
            'icon'          => 'nullable'
        ]);

        $rcu->update([
            'title'         => $request->title,
            'description'   => $request->description,
            'download_link' => $request->download_link,
            'icon'          => $request->icon ?? $rcu->icon,
        ]);

        return redirect()->route('rcu.index')->with('success','RCU actualizada');
    }

    public function destroy($id)
    {
        TableRcu::findOrFail($id)->delete();
        return redirect()->back()->with('success','RCU eliminada');
    }
}
