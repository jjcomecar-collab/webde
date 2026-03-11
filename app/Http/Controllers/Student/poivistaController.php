<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Tablepoi;

class PoivistaController extends Controller
{
    public function index()
    {
        // Registro activo (puede ser el último o el único)
        $poi = Tablepoi::where('estado', 1)->latest()->first();

        return view('student.BOrganizacion.dpoi', compact('poi'));
    }
}
