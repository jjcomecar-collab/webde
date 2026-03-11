<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Tableorganigrama;

class organigramaVistaController extends Controller
{
    public function viewgod()
    {
        $organigrama = Tableorganigrama::where('estado',1)->latest()->first();
        return view('student.AFacultad.dOrganigrama', compact('organigrama'));
    }
}

