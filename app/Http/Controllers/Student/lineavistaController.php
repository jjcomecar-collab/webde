<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Tablelinea;

class LineavistaController extends Controller
{
    public function index()
    {
        // Solo el registro activo
        $linea = Tablelinea::where('estado', 1)->first();

        return view('student.EInvestigacion.alinea', compact('linea'));
    }
}
