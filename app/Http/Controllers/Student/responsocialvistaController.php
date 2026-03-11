<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Tableresponsocial;

class ResponsocialvistaController extends Controller
{
    public function index()
    {
        // Registro activo (único o el primero)
        $responsocial = Tableresponsocial::where('estado', 1)->first();

        return view('student.BOrganizacion.hresponsocial', compact('responsocial'));
    }
}

