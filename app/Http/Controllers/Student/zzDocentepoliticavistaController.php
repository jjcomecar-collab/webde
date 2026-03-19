<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Tabledocentepolitica;

class DocentepoliticavistaController extends Controller
{
    public function index()
    {
        $nombrados = Tabledocentepolitica::where('estado', 1)
            ->where('tipo', 'nombrado')
            ->get();

        $contratados = Tabledocentepolitica::where('estado', 1)
            ->where('tipo', 'contratado')
            ->get();

        return view('student.AFacultad.hDocentes_Politica', compact('nombrados', 'contratados'));
    }
}
