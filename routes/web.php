<?php

use App\Http\Controllers\EmpleadosController;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

// Route::get('/empleados', 'EmpleadosController@index');
// Route::get('/empleados/create', 'EmpleadosController@create');

Route::resource('empleados', EmpleadosController::class)->middleware('auth');
Auth::routes(['register'=>false, 'reset'=>false]);

Route::get('/home', [EmpleadosController::class, 'index'])->name('home');

Route::group(['middleware'=> 'auth'], function () {
    
    Route::get('/', [EmpleadosController::class, 'index'])->name('home');
});