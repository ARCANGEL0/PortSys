<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConteinerController;
use App\Http\Controllers\MovimentacoesController;
use App\Http\Controllers\RelatorioController;

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
    return view('auth/login');
});

Auth::routes();


Route::get('conteiners', [ConteinerController::class, 'index'])->name('conteiners');

Route::get('conteiners/deletar/{id}', [ConteinerController::class, 'deletar'])->name('conteiners.deletar');

Route::get('conteiners/editar/{id}', [ConteinerController::class, 'editar'])->name('conteiners.editar')
;
Route::get('conteiners/cadastrar', [ConteinerController::class, 'cadastrar'])->name('conteiner.reg');


Route::get('Relatorio', [RelatorioController::class, 'index'])->name('gerar.relatorio');


Route::get('Relatorio/Download', [RelatorioController::class, 'download'])->name('relatoriodownload');


Route::get('movimentacoes', [MovimentacoesController::class, 'index']);
Route::get('movimentacoes/cadastrar', [MovimentacoesController::class, 'cadastrar'])->name('movimentacoes.reg');

Route::get('movimentacoes/deletar/{id}', [MovimentacoesController::class, 'deletar'])->name('movimentacoes.deletar');

Route::get('movimentacoes/editar/{id}', [MovimentacoesController::class, 'editar'])->name('movimentacoes.editar');








Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('conteiners', [ConteinerController::class, 'index'])->name('conteiners');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('conteiners', [ConteinerController::class, 'index'])->name('conteiners');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('conteiners', [ConteinerController::class, 'index'])->name('conteiners');

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');
Route::get('/conteiners', 'App\Http\Controllers\ConteinerController@index')->name('conteiners')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
Route::get('conteiners', [ConteinerController::class, 'index'])->name('conteiners');


    Route::get('movimentacoes', [MovimentacoesController::class, 'index'])->name('movimentacoes');


});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');
Route::get('/conteiners', 'App\Http\Controllers\ConteinerController@index')->name('conteiners')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
Route::get('conteiners', [ConteinerController::class, 'index'])->name('conteiners');


  Route::get('movimentacoes', [MovimentacoesController::class, 'index'])->name('movimentacoes');

});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});