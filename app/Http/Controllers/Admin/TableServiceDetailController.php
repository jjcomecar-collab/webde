<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TableServiceDetail;
use Illuminate\Http\Request;

class TableServiceDetailController extends Controller
{
    public function index($modulo)
    {
        $details = TableserviceDetail::where('modulo',$modulo)
            ->where('estado',1)
            ->get();

        return view('admin.service_details.index', compact('details','modulo'));
    }

    public function store(Request $request, $modulo)
    {
        $data = $request->all();
        $data['modulo'] = $modulo;

        if ($request->hasFile('imagen')) {
            $nombre = time().'.'.$request->imagen->extension();
            $request->imagen->move(public_path('imagenes'), $nombre);
            $data['imagen'] = $nombre;
        }

        $data['menu']  = $request->menu ? explode(',', $request->menu) : null;
        $data['lista'] = $request->lista ? explode(',', $request->lista) : null;

        TableserviceDetail::create($data);

        return back();
    }

    public function edit($modulo, TableserviceDetail $service_detail)
    {
        $details = TableserviceDetail::where('modulo',$modulo)
            ->where('estado',1)
            ->get();

        return view('admin.service_details.index',
            compact('details','service_detail','modulo'));
    }

    public function update(Request $request, $modulo, TableserviceDetail $service_detail)
    {
        $data = $request->all();
        $data['modulo'] = $modulo;

        if ($request->hasFile('imagen')) {
            $nombre = time().'.'.$request->imagen->extension();
            $request->imagen->move(public_path('imagenes'), $nombre);
            $data['imagen'] = $nombre;
        }

        $data['menu']  = $request->menu ? explode(',', $request->menu) : null;
        $data['lista'] = $request->lista ? explode(',', $request->lista) : null;

        $service_detail->update($data);

        return redirect()->route('admin.service-details.index', $modulo);
    }

    public function destroy($modulo, TableserviceDetail $service_detail)
    {
        $service_detail->update(['estado'=>0]);
        return back();
    }
}
