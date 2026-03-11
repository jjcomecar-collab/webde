<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Tabledecanofun;

class DecanofunvistaController extends Controller
{
    public function index()
    {
        // Tomamos el primer registro activo (normalmente solo uno)
        $decano = Tabledecanofun::where('estado', 1)->first();

        return view('student.BOrganizacion.bdecano', compact('decano'));
    }
}
