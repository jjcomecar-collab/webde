<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Tabledepartamento;

class DepartamentoVistaController extends Controller
{
    public function index()
    {
        // Registro activo (normalmente uno solo)
        $departamento = Tabledepartamento::where('estado', 1)->first();

        return view('student.BOrganizacion.edepartamento', compact('departamento'));
    }
}
