<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Tabletramitecosto;

class TramitecostovistaController extends Controller
{
    public function index()
    {
        $items = Tabletramitecosto::where('estado', 1)
                    ->orderBy('order')
                    ->get()
                    ->groupBy('section'); 
        // agrupamos por sección: pagos, servicios, etc.

        return view('student.BOrganizacion.itramites', compact('items'));
    }
}
