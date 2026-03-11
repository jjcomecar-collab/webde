<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\TableDocenteDerecho;


class DocenteDerechoVistaController extends Controller
{
    public function index()
    {
        $nombrados = TableDocenteDerecho::where('estado', 1)
            ->where('tipo', 'DOCENTES NOMBRADOS')
            ->orderBy('orden')
            ->get();

        $contratados = TableDocenteDerecho::where('estado', 1)
            ->where('tipo', 'DOCENTES CONTRATADOS')
            ->orderBy('orden')
            ->get();

        return view('student.AFacultad.gDocentes_Derecho', compact(
            'nombrados',
            'contratados'
        ));
    }
}
