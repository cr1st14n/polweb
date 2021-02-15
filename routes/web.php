<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\UsuarioController;
use GuzzleHttp\Middleware;
use Illuminate\Routing\RouteGroup;
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

   
   return'hola que tal a ';
   return view('welcome');
=======
    return view('Auth.login');
})->Middleware('guest')->name('pagLogin');
Route::post('login',[loginController::class,'login'])->middleware('guest')->name('login');
Route::post('logout',[loginController::class,'logout'])->middleware('auth');

Route::group(['prefix'=>'/'],function ()
{
    Route::get('inicio',[homeController::class,'index']);
>>>>>>> dev1
});

Route::group(['prefix'=>'usuario'],function()
{
    Route::get('index/',[UsuarioController::class,'index']);
    Route::post('store/',[UsuarioController::class,'store']);
    Route::get('listA/',[UsuarioController::class,'listA']);
    Route::get('delete/',[UsuarioController::class,'delete']);
});
