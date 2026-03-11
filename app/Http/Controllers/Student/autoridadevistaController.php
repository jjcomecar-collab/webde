<?php
namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Tableautoridade;

class autoridadevistaController extends Controller
{
    public function index()
    {
        $teams = Tableautoridade::where('estado', 1)
            ->orderBy('orden')
            ->get();

        return view('student.Afacultad.eAutoridades', compact('teams'));
    }
}
