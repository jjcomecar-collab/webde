<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Tableestandare;

class EstandarevistaController extends Controller
{
    public function index()
    {
        $data = Tableestandare::where('estado', 1)->first();
        return view('student.FCalidad.aestandares', compact('data'));
    }
}
