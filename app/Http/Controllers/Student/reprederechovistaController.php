<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Tablereprederecho;



class ReprederechovistaController extends Controller
{
    public function index()
    {
        $reprederecho = Tablereprederecho::where('estado', 1)->first();

        return view('student.BOrganizacion.freprederecho', compact('reprederecho'));
    }
}
