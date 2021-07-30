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