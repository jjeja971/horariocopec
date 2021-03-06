<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AtendedorController;
use App\Http\Controllers\HorariosController;
use App\Http\Controllers\ControllerHorarioDos;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransaccionController;
use App\Http\Controllers\AutomaticoController;
use App\Http\Controllers\VerHorarioController;
use App\Http\Controllers\ReportePDFController;
use App\Http\Controllers\JornadaController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [Controller::class, 'login']);
Route::get('/Inicio', [Controller::class, 'Inicio']);

/*Route::get('/probando', function () {
    return view('proban2');
});*/

//---------------------ATENDEDOR CONTROLLER----

Route::get('/probando', [AtendedorController::class, 'probando']);
Route::get('/listaratendedores', [AtendedorController::class, 'listaratendedores']);
Route::get('/exportate',[AtendedorController::class, 'exportate']);

Route::get('/nuevoatendedor', [AtendedorController::class, 'natendedor']);
Route::get('/nuevoturno', [AtendedorController::class, 'nuevoturno']);
Route::get('/modatendedor/{rut}', [AtendedorController::class, 'matendedor']);
Route::get('/eliminar_atendedor/{rut}', [AtendedorController::class, 'eliminar_atendedor']);

Route::post('/insertaratendedor', [AtendedorController::class, 'creaatendedor']);
Route::post('/modificaratendedor', [AtendedorController::class, 'modicaratendedor']);



Route::get('/menuHorario', [HorariosController::class, 'menuHorario']);
Route::get('/horarioManual', [HorariosController::class, 'horarioManual']);
Route::get('/interfazTurnos', [HorariosController::class, 'ITurnos']);
Route::get('/modificarTurno/{id}', [HorariosController::class, 'modTurno']);

Route::post('/registrarhorarios', [HorariosController::class, 'registrar_horario']);
Route::post('/modificaturnohorario', [HorariosController::class, 'modificarTurnoHorario']);
Route::post('/eliminarturnohorario', [HorariosController::class, 'eliminarturnohorario']);
Route::post('/gestionturnohorario', [HorariosController::class, 'formturnohorario']);
Route::post('/registurno', [HorariosController::class, 'registrar_turno']);

//Route::resource('horarios', HorariosController::class);

//---------------------HORARIO AUTOMATICO CONTROLLER----

Route::post('/horarioAutomatico', [AutomaticoController::class, 'horarioAutomatico']);


//---------------------HORARIO2 CONTROLLER----

Route::get('/listahorario', [ControllerHorarioDos::class, 'listahorario']);
Route::get('/nuevohorario', [ControllerHorarioDos::class, 'nuevohorario']);


//---------------------AUTENTICACION CONTROLLER----

Route::get('/cerrar_sesion',[AuthController::class, 'cerrar_sesion']);

Route::post('/registrarse', [AuthController::class, 'iniciar_sesion']);

//---------------------Cargar Transacciones controler----

Route::get('/cargartransaccion', [TransaccionController::class, 'transacciones']);

Route::post('/importexel', [TransaccionController::class, 'importexel']);

//---------------------VER HORARIO CONTROLLER----

Route::get('/verhorario', [VerHorarioController::class, 'verhorario']);
Route::get('/irhorario/{fecha}', [VerHorarioController::class, 'irhorario']);
Route::get('/horariosemana/{fecha2}', [VerHorarioController::class, 'horariosemana']);
Route::get('/export',[VerHorarioController::class, 'export']);

//--------------------- JORNADA CONTROLLER----
Route::get('/verjornada', [JornadaController::class, 'verjornada']);
Route::get('/agregarjornada', [JornadaController::class, 'agregarjornada']);

Route::post('/registrarjornada', [JornadaController::class, 'registrarjornada']);

//-----------------------REPORTES PDF---
Route::post('/convertirpdf/{fecha}',[ReportePDFController::class, 'imprimirgrafi']);
Route::post('/convertirpdfhorasemana/{fecha}',[ReportePDFController::class, 'imprimirhorariosemana']);