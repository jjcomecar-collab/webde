<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Tablenormatividad;

class NormatividadvistaController extends Controller
{
    public function index()
    {
        $about = Tablenormatividad::where('section','about')
                    ->where('estado',1)
                    ->first();

        $features = Tablenormatividad::where('section','feature')
                    ->where('estado',1)
                    ->get();

        return view('student.GTransparencia.anormatividad', compact('about','features'));
    }
}
