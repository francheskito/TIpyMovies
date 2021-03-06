<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Resources\UserResource;

use App\Http\Controllers\UserController;
use App\Http\Controllers\PeliculasController;
use App\http\Controllers\PreguntasController;
use App\Models\User;

Route::get('/user/{id}', [UserController::class,'show']);
Route::view('/', 'home')->name('home');
Route::view('/profile/edit', 'profile.edit')->middleware('auth')->name('UpdateUser');
Route::GET('/Peliculas', [PeliculasController::class, 'getLista2'])->name('listarPeliculas');
Route::GET('/userProfile/{iduser}', [UserController::class, 'userScores'])->name('userProfile');
//Route::GET('/Peliculas', 'App\Http\Controllers\PeliculasController@getLista');

	Route::GET('/Peliculasxd/{idchossen}/{titlepeli}', [PeliculasController::class, 'mostraruna'])->name('DetallePeliculas');

Route::GET('/Peliculas/{texto_busqueda}', [PeliculasController::class, 'getLista'])->name('listarPeliculas.busqueda');

Route::GET('/Peliculas/{texto_busqueda}/{page}', [PeliculasController::class, 'getLista'])->name('listarPeliculas.busqueda.page');

Route::GET('/Series/{idchossen}/{titlepeli}', [PeliculasController::class, 'mostrarunaSerie'])->name('DetalleSeries');

Route::GET('/Series/{texto_busqueda}', [PeliculasController::class, 'getListaSeries'])->name('listarSeries.busqueda');

Route::GET('/RankingTrivia', [PreguntasController::class, 'toptentrivia'])->name('toptentrivia');

Route::GET('/Series/{texto_busqueda}/{page}', [PeliculasController::class, 'getListaSeries'])->name('listarSeries.busqueda.page');

/*Route::GET('/user/{id}', function ($id) {
    return new UserResource(User::findOrFail($id));
});
*/
Route::GET('/users', function () {
    return UserResource::collection(User::all());
});

Route::GET('/user/{id}/{pass}', function ($id) {
    return new UserResource(User::where('username',$id)->where('password',$pass)->firstOrFail());
});



  /*  Route::bind('user', function ($value) {
        return User::where('name', $value)->firstOrFail();
    });*/

Route::GET('/lista', [PeliculasController::class,'getLista2'])->name('lista');
Route::GET('/topten', [PreguntasController::class,'topten'])->name('topten');
Route::GET('/toptenPeli', [PreguntasController::class,'toptenPeli'])->name('toptenPeli');
Route::GET('/AgregarPregunta/{imdbID}/{titulo}', function($id,$titulo){
    return view('AgregarPregunta', ['titulo' => $titulo, 'imdbID' => $id]);
})->name('Agregar.pregunta');

Route::GET('/MiniJuego1/{imdbID}/{titulo}', function($id,$titulo){
    return view('AgregarPregunta', ['titulo' => $titulo, 'imdbID' => $id]);
})->name('MiniJuego1.Jugar');

Route::GET('/Minijuego1/{imdbID}/{titulo}',[PreguntasController::class,'getCuestionario'])->name('MiniJuego1');

Route::GET('/Minijuego2',[PreguntasController::class,'getCuestionario2'])->name('MiniJuego2');

Route::POST('/AgregarPregunta', [PreguntasController::class,'Agregar'])->name('Agregar');

Route::POST('/MiniJuego1/Puntuacion/{imdbID}/{titulo}',[PreguntasController::class,'puntuar'])->name('Puntuar');

Route::POST('/MiniJuego1/Puntuacion',[PreguntasController::class,'puntuar2'])->name('Puntuar2');

Route::GET('/Ranking', [PreguntasController::class,'getTopScore'])->name('ranking');
Route::view('/contactUs', 'contactUs')->name('ContactUs');
Route::GET('/contact-us', [ContactUsController::class,'contactUs'])->name('contact-us');
Route::POST('/contactUs', [ContactUsController::class,'contactUsPost'])->name('contactus.store');
