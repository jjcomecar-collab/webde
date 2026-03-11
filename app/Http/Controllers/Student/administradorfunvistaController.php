<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Tableadministradorfun;

class administradorfunvistaController extends Controller
{
    public function index()
    {
        // Tomamos el primer registro activo (normalmente solo uno)
        $administrador = Tableadministradorfun::where('estado', 1)->first();

        return view('student.BOrganizacion.cAdministrador', compact('administrador'));
    }
}
