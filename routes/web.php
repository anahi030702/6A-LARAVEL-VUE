<?php

use App\Http\Controllers\MoviesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PruebaController;
use App\Models\Movie;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';

Route::get('/prueba', [PruebaController::class, 'prueba']);
Route::get('/personas', [PruebaController::class, 'personas'])->name('personas.inicio');
Route::get('/personas/form', [PruebaController::class, 'form'])->name('personas.form');
Route::post('/personas/create', [PruebaController::class, 'create']);
Route::delete('personas/borrar/{id}', [PruebaController::class, 'borrar']);
Route::get('/personas/formedit/{id}', [PruebaController::class, 'formedit'])->name('personas.formedit');
Route::put('/personas/update', [PruebaController::class, 'update']);


Route::get('/movies', [MoviesController::class, 'index'])->name('movies.index');
Route::get('/movies/form', [MoviesController::class, 'form'])->name('movies.form');
Route::post('/movies/create', [MoviesController::class, 'create']);
Route::delete('movies/borrar/{id}', [MoviesController::class, 'delete']);
Route::get('/movies/formedit/{id}', [MoviesController::class, 'formedit'])->name('movies.formedit');
Route::put('/movies/update', [MoviesController::class, 'update'])->name('movies.update');

Route::get('/schedules', [MoviesController::class, 'index'])->name('movies.index');












