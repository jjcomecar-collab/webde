<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\TableAbout;
use App\Models\TableService;
use App\Models\TableServiceDetail;
use App\Models\TableFeature;
use App\Models\TableAlumnotesista;


class HomeController extends Controller
{
    public function home()
    {
        return view('student.home');
    }

    public function index($modulo)
    {

        // ALUMNOS TESISTAS (SOLO DERECHO)
        $alumnotesistas = null;

        if ($modulo === 'derecho') {
            $alumnotesistas = TableAlumnotesista::where('modulo', 'derecho')
                ->where('estado', 1)
                ->get();
        }


        // ABOUT
        $about = Tableabout::where('modulo', $modulo)
            ->where('estado', 1)
            ->first();

        // SERVICES
        $services = Tableservice::where('modulo', $modulo)
            ->where('estado', 1)
            ->get();

        // SERVICE DETAILS (INDEPENDIENTE)
        $serviceDetails = TableserviceDetail::where('modulo', $modulo)
            ->where('estado', 1)
            ->get();

        // FEATURES
        $features = Tablefeature::where('modulo', $modulo)
            ->where('estado', 1)
            ->get();

            dd($features);

        // VISTA SEGÚN MÓDULO
        $view = match ($modulo) {
            'cepejup'      => 'student.HCepejup.aCepejup',
            'normatividad' => 'student.GTransparencia.aNormatividad',
            'estandares'   => 'student.FCalidad.aEstandares',
            'reprederecho' => 'student.BOrganizacion.fRepreDerecho',
            'tramitecosto' => 'student.BOrganizacion.iTramites',
            'comite'       => 'student.BOrganizacion.jComite',
            'rsu'          => 'student.BOrganizacion.kRsu',
            'tutoria'      => 'student.BOrganizacion.Ltutoria',
            'derecho'      => 'student.CCarrera.aDerecho',
            'politica'     => 'student.CCarrera.bPolitica',
            'use'          => 'student.FCalidad\bUse',
            'estructura'   => 'student.EInvestigacion.bEstructura',
            'acreditacion' => 'student.IAcreditacion.aAcreditacion',
            'presentacion' => 'student.AFacultad.aPresentacion',
            'consejofacultad' => 'student.BOrganizacion.aConsejoFacultad',
            'visionmision' => 'student.AFacultad.bMision_vision',






            default        => abort(404),
        };



        return view($view, compact(
            'about',
            'services',
            'serviceDetails',
            'features',
            'alumnotesistas', // 👈 solo lleno en DERECHO
            'modulo'
        ));
    }
}
