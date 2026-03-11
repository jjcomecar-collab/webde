<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Tableconsejofacultad;

class ConsejofacultadvistaController extends Controller
{
    public function index()
    {
        // Solo un registro activo
        $data = Tableconsejofacultad::where('estado', 1)->first();

        return view('student.BOrganizacion.aConsejoFacultad', compact('data'));
    }
}
