<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tableabout;
use Illuminate\Http\Request;

class TableAboutController extends Controller
{
    public function index($modulo)
    {
        $abouts = Tableabout::where('modulo', $modulo)
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
            $data['video_url'] = 'https://www.youtube.com/embed/' . $m[2];
        }

        Tableabout::create($data);

        return back()->with('success', 'Creado correctamente');
    }


    public function edit($modulo, Tableabout $about)
    {
        $abouts = Tableabout::where('modulo', $modulo)
            ->where('estado', 1)
            ->get();

        return view('admin.abouts.index', compact('abouts', 'about', 'modulo'));
    }

    public function update(Request $request, $modulo, Tableabout $about)
    {
        // 1️⃣ Validación
        $request->validate([
            'video_url' => [
                'nullable',
                'url',
                'regex:/^(https?:\/\/)?(www\.)?(youtube\.com\/watch\?v=|youtu\.be\/)[\w-]{11}/'
            ],
        ]);

        // 2️⃣ Data base
        $data = $request->except('modulo');
        $data['modulo'] = $modulo;

        // 3️⃣ Imagen
        if ($request->hasFile('imagen')) {
            $nombre = time() . '.' . $request->imagen->extension();
            $request->imagen->move(public_path('imagenes'), $nombre);
            $data['imagen'] = $nombre;
        }

        // 4️⃣ Items (JSON)
        $data['items'] = $request->items
            ? array_map('trim', explode(',', $request->items))
            : null;

        // 5️⃣ Video YouTube → EMBED
        if ($request->video_url) {
            preg_match(
                '/(youtu\.be\/|v=)([a-zA-Z0-9_-]{11})/',
                $request->video_url,
                $matches
            );

            $data['video_url'] = isset($matches[2])
                ? 'https://www.youtube.com/embed/' . $matches[2]
                : null;
        } else {
            // si borran el campo, se limpia
            $data['video_url'] = null;
        }

        // 6️⃣ Update
        $about->update($data);

        return redirect()
            ->route('admin.abouts.index', $modulo)
            ->with('success', 'Actualizado correctamente');
    }


    public function destroy($modulo, Tableabout $about)
    {
        $about->update(['estado' => 0]);
        return back();
    }
}
