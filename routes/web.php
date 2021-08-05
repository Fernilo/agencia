<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/saludo', function() {
    return 'hola mundo desde Laravel';
});

Route::get('/saludo2' , function() {
    $nombre = 'azael';
    $cenas = ['Choripan' , 'asado'];
    return view('primera', 
        [
            'nombre' => $nombre,
            'cenas' => $cenas
        ]
    );
});

Route::get('/regiones', function() {
    //obtenemos listado de regiones
    $regiones = DB::select('SELECT regId , regNombre FROM regiones');

    return view('segunda' , ['regiones' => $regiones]);
});

Route::get('/inicio', function () {
    return view('inicio');
});

Route::get('/adminRegiones', function () {
    $regiones = DB::select('SELECT regID , regNombre regNombre FROM regiones');

    return view('adminRegiones' , ['regiones' => $regiones]);
});

Route::get('agregarRegion', function () {
    return view('agregarRegion');
});

Route::post('/agregarRegion', function ()
{
    //capturar dato enviado
    $regNombre = $_POST['regNombre'];
    //insertar en tabla regiones
    DB::insert('
                INSERT INTO regiones
                            ( regNombre )
                        VALUE
                            ( :manzana )',
                            [ $regNombre ]
                );
    //redirección con mensaje ok (flashing)
    return redirect('/adminRegiones')
                ->with( [ 'mensaje'=>'Región: '.$regNombre.' agregada correctamente' ] );
});

Route::get('adminDestinos', function () {
    $destinos = DB::select('SELECT * FROM destinos d
         JOIN regiones r ON d.regID = r.regID');
         
    return view('adminDestinos' , ['destinos' => $destinos]);
});

Route::get('agregarDestino', function () {
    return view('agregarDestino');
});

Route::post('agregarDestino', function () {
     //capturar dato enviado
     $destNombre = $_POST['destNombre'];
     $destPrecio = $_POST['destPrecio'];
     $destAsientos = $_POST['destAsientos'];
     $destDisponibles = $_POST['destDisponibles'];
     $destActivo = $_POST['destActivo'];
     $regID = $_POST['regID'];


     //insertar en tabla destinos
     DB::insert('
                 INSERT INTO destinos
                             ( destNombre,regId,destPrecio,destAsientos,destDisponibles,destActivo )
                         VALUE
                             ( :destNombre,:regId,:destPrecio,:destAsientos,:destDisponibles,:destActivo )',
                             [ $destNombre,$regID,$destPrecio,$destAsientos,$destDisponibles,$destActivo ]
                 );
     //redirección con mensaje ok (flashing)
     return redirect('/adminDestinos')
                 ->with( [ 'mensaje'=>'Destino: '.$destNombre.' agregado correctamente' ] );
});