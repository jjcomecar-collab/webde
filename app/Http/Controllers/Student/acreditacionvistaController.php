<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Tableacreditacion;

class acreditacionvistaController extends Controller
{
    public function index()
    {

        $data = Tableacreditacion::first(); // REGISTRO ÚNICO

        return view('student\IAcreditacion\aAcreditacion', compact('data'));
    }
}



