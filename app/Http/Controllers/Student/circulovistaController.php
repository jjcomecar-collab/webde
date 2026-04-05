<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Tablecirculo;

class CirculoVistaController extends Controller
{
    public function index()
    {
        $circulos = Tablecirculo::where('estado', 1)
            ->orderBy('circulo', 'asc')   // orden alfabético de círculos
            ->orderBy('orden', 'asc')     // orden manual de integrantes
            ->get()
            ->groupBy('circulo');         // agrupar por nombre del círculo

        return view('student.BOrganizacion.mCirculo', compact('circulos'));
    }
}