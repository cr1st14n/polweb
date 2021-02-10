<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
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
    return view('Auth.login');
    // return view('welcome');
});
Route::post('login',[loginController::class,'login'])->middleware('guest')->name('login');
Route::group(['prefix'=>'/'],function ()
{
    Route::get('inicio',[homeController::class,'index']);
});
