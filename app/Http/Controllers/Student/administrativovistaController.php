<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Tableadministrativo;



class administrativovistaController extends Controller
{
    public function index()
    {
      

        $administrativos = Tableadministrativo::where('estado', 1)
        ->orderBy('orden')
        ->get();

    return view('student.Afacultad.fAdministrativos', compact('administrativos'));
    }
}
