<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Tablecarrusel;
use App\Models\tablesquare;
use App\Models\tablewelcome;
use App\Models\tablerunauto;
use App\Models\Tablequantitie;
use App\Models\Tabledecano;
use App\Models\Tableauditorio;
use App\Models\Tablercu;
use App\Models\Tablehorario;
use App\Models\Tablebachiller;

use App\Models\Tableportfolio;

class InicioController extends Controller
{
    public function index()
    {
        // ================================
        // A. CARRUSEL
        // ================================
        $v_imagenes = Tablecarrusel::where('estado', 1)
            ->pluck('imagen');



        // ================================
        // B. PORTAFOLIO
        // ================================
        $noticias = Tableportfolio::where('estado', 1)
            ->where('categoria', 'noticia')
            ->orderBy('created_at', 'desc')
            ->get();

        $eventos = Tableportfolio::where('estado', 1)
            ->where('categoria', 'evento')
            ->orderBy('created_at', 'desc')
            ->get();

        $onomasticos = Tableportfolio::where('estado', 1)
            ->where('categoria', 'onomastico')
            ->orderBy('created_at', 'desc')
            ->get();

        // Mezclar intercalando
        $portfolioItems = collect();
        $max = max($noticias->count(), $eventos->count(), $onomasticos->count());

        for ($i = 0; $i < $max; $i++) {
            if (isset($noticias[$i])) $portfolioItems->push($noticias[$i]);
            if (isset($eventos[$i])) $portfolioItems->push($eventos[$i]);
            if (isset($onomasticos[$i])) $portfolioItems->push($onomasticos[$i]);
        }

        

        // ================================
        // C. SQUARES
        // ================================
        $squares = Tablesquare::orderBy('id')->get();






        // ================================
        // D. WELCOME
        // ================================
        $welcome = Tablewelcome::where('estado', 1)->first();


        $runautos = Tablerunauto::where('estado', 1)
            ->orderBy('orden')
            ->get();


            $quantities = Tablequantitie::where('estado', 1)->get();


                $decano = TableDecano::where('estado', 1)
        ->orderBy('orden')
        ->first();




                $auditorios = Tableauditorio::where('estado', 1)
            ->orderBy('id', 'asc')
            ->get();





                    $rcus = TableRcu::where('estado', 1)
            ->orderBy('id','desc')
            ->get();




        $horarios = Tablehorario::where('estado', 1)->get();


$bachillers = Tablebachiller::where('estado', 1)->get();


        // ================================
        // 🔹 RETORNO DE VISTA
        // ================================
        return view('student.inicio', compact(
            'v_imagenes',
            'portfolioItems',
            'squares',
            'welcome',
            'runautos',
            'quantities',
            'decano',
            'auditorios',
            'rcus',
            'horarios',
            'bachillers'
        ));

    }

}
