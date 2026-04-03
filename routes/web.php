<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Student\inicioController;  // front con DB
use App\Http\Controllers\Student\HistoriaVistaController;  // front con DB
use App\Http\Controllers\Student\organigramaVistaController;  // front con DB
use App\Http\Controllers\Student\autoridadevistaController;  // front con DB
use App\Http\Controllers\Student\administrativovistaController;  // front con DB
use App\Http\Controllers\Student\docentederechovistaController;  // front con DB
use App\Http\Controllers\Student\DecanofunvistaController;
use App\Http\Controllers\Student\administradorfunvistaController;
use App\Http\Controllers\Student\poivistaController;
use App\Http\Controllers\Student\departamentovistaController;
use App\Http\Controllers\Student\reprederechovistaController;
use App\Http\Controllers\Student\reprepoliticavistaController;
use App\Http\Controllers\Student\responsocialvistaController;
use App\Http\Controllers\Student\tramitecostovistaController;

use App\Http\Controllers\Student\lineavistaController;

use App\Http\Controllers\Student\estandarevistaController;

use App\Http\Controllers\Student\normatividadvistaController;


use App\Http\Controllers\Student\HomeController;

use App\Http\Controllers\Student\acreditacionvistaController;





use App\Http\Controllers\Admin\carruselController;
use App\Http\Controllers\Admin\SquareController;
use App\Http\Controllers\Admin\welcomeController;
use App\Http\Controllers\Admin\runautoController;
use App\Http\Controllers\Admin\quantitieController;
use App\Http\Controllers\Admin\decanoController;
use App\Http\Controllers\Admin\auditorioController;
use App\Http\Controllers\Admin\rcuController;
use App\Http\Controllers\Admin\portfolioController;
use App\Http\Controllers\Admin\horarioController;
use App\Http\Controllers\Admin\bachillerController;
use App\Http\Controllers\Admin\historiaController;
use App\Http\Controllers\Admin\organigramaController;
use App\Http\Controllers\Admin\autoridadeController;
use App\Http\Controllers\Admin\administrativoController;
use App\Http\Controllers\Admin\docentederechoController;
use App\Http\Controllers\Admin\docentepoliticaController;
use App\Http\Controllers\Admin\consejofacultadController;
use App\Http\Controllers\Admin\decanofunController;
use App\Http\Controllers\Admin\administradorfunController;
use App\Http\Controllers\Admin\poiController;
use App\Http\Controllers\Admin\departamentoController;
use App\Http\Controllers\Admin\reprederechoController;
use App\Http\Controllers\Admin\reprepoliticaController;
use App\Http\Controllers\Admin\responsocialController;
use App\Http\Controllers\Admin\TramitecostoController;

use App\Http\Controllers\Admin\lineaController;

use App\Http\Controllers\Admin\estandareController;

use App\Http\Controllers\Admin\normatividadController;



use App\Http\Controllers\Admin\acreditacioncontroller;


use App\Http\Controllers\Admin\TableAboutController;
use App\Http\Controllers\Admin\TableServiceController;
use App\Http\Controllers\Admin\TableServiceDetailController;
use App\Http\Controllers\Admin\TableFeatureController;
use App\Http\Controllers\Admin\TableAlumnotesistaController;






/*
|--------------------------------------------------------------------------
| 🌍 MODO USUARIO (PÚBLICO)
|--------------------------------------------------------------------------
*/

Route::get('/', [inicioController::class, 'index'])->name('inicio');


Route::get('/historia_vista', [HistoriaVistaController::class, 'viewgod'])->name('historia');
Route::get('/organigrama_vista', [organigramavistaController::class, 'viewgod'])->name('organigrama');
Route::get('/autoridadesv', [autoridadevistaController::class, 'index'])->name('autoridade');
Route::get('/administrativov', [administrativovistaController::class, 'index'])->name('administrativo');
Route::get('/docentes-derechov', [DocenteDerechoVistaController::class, 'index'])->name('docentederecho');

Route::get('/docentes-politicav', [\App\Http\Controllers\Student\docentepoliticavistaController::class, 'index'])->name('docentepolitica');
Route::get('/consejo-Facultadv', [\App\Http\Controllers\Student\ConsejofacultadvistaController::class, 'index'])->name('consejofacultad');
Route::get('/decanof', [DecanofunvistaController::class, 'index'])->name('decanofun');
Route::get('/administradorf', [administradorfunvistaController::class, 'index'])->name('administradorfun');
Route::get('/poiv', [poivistaController::class, 'index'])->name('poi');
Route::get('/departamentov', [departamentovistaController::class, 'index'])->name('departamento');
Route::get('/reprederechov', [reprederechovistaController::class, 'index'])->name('reprederecho');
Route::get('/reprepoliticav', [reprepoliticavistaController::class, 'index'])->name('reprepolitica');
Route::get('/responsocialv', [responsocialvistaController::class, 'index'])->name('responsocial');
Route::get('/tramites-costosv', [tramitecostovistaController::class, 'index'])->name('tramitecosto');

Route::get('/lineav', [lineavistaController::class, 'index'])->name('linea');

Route::get('/estandarev', [estandarevistaController::class, 'index'])->name('estandare');

Route::get('/normatividadv', [normatividadvistaController::class, 'index'])->name('normatividad');


Route::get('/acreditacionv', [acreditacionvistaController::class, 'index'])->name('acreditacion');






Route::get('/student/{modulo}', [HomeController::class, 'index'])->name('student.modulo');





/*
|--------------------------------------------------------------------------
| 🔐 MODO ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    // 1) CARRUSEL CRUD
    Route::resource('carrusel', carruselController::class)->except(['show']);

    // 2) SQUARES CRUD
    // Route::resource('square', SquareController::class)->except(['show']); 
    
    Route::get('square-data', [SquareController::class, 'data'])->name('square.data');
    Route::resource('square', SquareController::class)->except(['show']);


    // 3)   WELCOME CRUD
    Route::resource('welcome', welcomeController::class)->except(['show']);

    // 4)   RUNAUTO CRUD
    Route::resource('runauto', runautoController::class)->except(['show']);

    // 5)   QUANTITIES CRUD
    Route::resource('quantitie', quantitieController::class)->except(['show']);


    Route::resource('decano', decanoController::class)->except(['show']);


    Route::resource('auditorio', auditorioController::class)->except(['show']);


    Route::resource('rcu', rcuController::class)->except(['show']);


    // 9) PORTAFOLIO CRUD
    Route::resource('portafolio', portfolioController::class)->except(['show']);


    Route::resource('horario', horarioController::class)->except(['show']);


    Route::resource('bachiller', bachillerController::class)->except(['show']);

    Route::resource('historia', historiaController::class)->except(['show']);

    Route::resource('organigrama', organigramaController::class)->except(['show']);

    Route::resource('autoridade', autoridadeController::class)->except(['show']);

    Route::resource('administrativo', administrativoController::class)->except(['show']);

    Route::resource('docentederecho', docentederechoController::class)->except(['show']);

    Route::resource('docentepolitica', docentepoliticaController::class)->except(['show']);

    Route::resource('consejofacultad', consejofacultadController::class)->except(['show']);

    Route::resource('decanofun', decanofunController::class)->except(['show']);

    Route::resource('administradorfun', administradorfunController::class)->except(['show']);

    Route::resource('poi', poiController::class)->except(['show']);

    Route::resource('departamento', departamentoController::class)->except(['show']);

    Route::resource('reprederecho', reprederechoController::class)->except(['show']);

    Route::resource('reprepolitica', reprepoliticaController::class)->except(['show']);

    Route::resource('responsocial', responsocialController::class)->except(['show']);

    Route::resource('tramitecosto', TramitecostoController::class)->except(['show']);

    Route::resource('acreditacion', acreditacioncontroller::class)->except(['show']);

    Route::resource('normatividad', normatividadController::class)->except(['show']);

    Route::resource('linea', lineaController::class)->except(['show']);

    Route::resource('estandare', estandareController::class)->except(['show']);



    Route::prefix('admin/{modulo}')
        ->name('admin.')
        ->group(function () {

            Route::resource('abouts', TableAboutController::class);
            Route::resource('services', TableServiceController::class);
            Route::resource('service-details', TableServiceDetailController::class);
            Route::resource('features', TableFeatureController::class);

            Route::resource('alumnotesistas', TableAlumnotesistaController::class);

            // 🔁 RESTAURAR (eliminado lógico)
            Route::put(
                'alumnotesistas/{id}/restore',
                [TableAlumnotesistaController::class, 'restore']
            )->name('alumnotesistas.restore');
        });
});
