<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Tablehistoria;

class HistoriaVistaController extends Controller
{
    public function viewgod()
    {
        // Obtiene la historia activa
        $historia = Tablehistoria::where('estado', 1)
            ->orderBy('id', 'desc')
            ->first();

        return view('student.AFacultad.cHistoria', compact('historia'));
    }
}

