<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Tablereprepolitica;



class ReprepoliticavistaController extends Controller
{
    public function index()
    {
        $repre = Tablereprepolitica::where('estado', 1)->first();

        return view('student.BOrganizacion.greprepolitica', compact('repre'));
    }
}
