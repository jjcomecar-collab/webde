<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TableAbout;
use Illuminate\Http\Request;

class TableAboutController extends Controller
{
    public function index($modulo)
    {
        $abouts = TableAbout::where('modulo', $modulo)
            ->where('estado', 1)
            ->get();

        return view('admin.abouts.index', compact('abouts', 'modulo'));
    }

    public function store(Request $request, $modulo)
    {
        $request->validate([
            'video_url' => [
                'nullable',
                'url',
                'regex:/^(https?:\/\/)?(www\.)?(youtube\.com\/watch\?v=|youtu\.be\/)[\w-]{11}/'
            ],
        ]);

        $data = $request->except('modulo');
        $data['modulo'] = $modulo;

        if ($request->hasFile('imagen')) {
            $nombre = time() . '.' . $request->imagen->extension();
            $request->imagen->move(public_path('imagenes'), $nombre);
            $data['imagen'] = $nombre;
        }

        $data['items'] = $request->items
            ? explode(',', $request->items)
            : null;

        if ($request->video_url) {
            preg_match('/(youtu\.be\/|v=)([a-zA-Z0-9_-]{11})/', $request->video_url, $m);
            $data['video_url'] = isset($m[2]) ? 'https://www.youtube.com/embed/' . $m[2] : null;
        }

        TableAbout::create($data);

        return back()->with('success', 'Creado correctamente');
    }

    public function edit($modulo, TableAbout $about)
    {
        $abouts = TableAbout::where('modulo', $modulo)
            ->where('estado', 1)
            ->get();

        return view('admin.abouts.index', compact('abouts', 'about', 'modulo'));
    }

    public function update(Request $request, $modulo, TableAbout $about)
    {
        $request->validate([
            'video_url' => [
                'nullable',
                'url',
                'regex:/^(https?:\/\/)?(www\.)?(youtube\.com\/watch\?v=|youtu\.be\/)[\w-]{11}/'
            ],
        ]);

        $data = $request->except('modulo');
        $data['modulo'] = $modulo;

        if ($request->hasFile('imagen')) {
            $nombre = time() . '.' . $request->imagen->extension();
            $request->imagen->move(public_path('imagenes'), $nombre);
            $data['imagen'] = $nombre;
        }

        $data['items'] = $request->items
            ? array_map('trim', explode(',', $request->items))
            : null;

        if ($request->video_url) {
            preg_match('/(youtu\.be\/|v=)([a-zA-Z0-9_-]{11})/', $request->video_url, $matches);

            $data['video_url'] = isset($matches[2])
                ? 'https://www.youtube.com/embed/' . $matches[2]
                : null;
        } else {
            $data['video_url'] = null;
        }

        $about->update($data);

        return redirect()
            ->route('admin.abouts.index', $modulo)
            ->with('success', 'Actualizado correctamente');
    }

    public function destroy($modulo, TableAbout $about)
    {
        $about->update(['estado' => 0]);

        return redirect()
            ->route('admin.abouts.index', $modulo)
            ->with('success', 'Eliminado correctamente');
    }
}