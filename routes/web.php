<?php

use App\Http\Controllers\CinemasController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SchedulesController;
use App\Http\Controllers\ScreeningsController;
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

Route::get('/movies/get', [MoviesController::class, 'getMovies']);
Route::get('/movies', [MoviesController::class, 'index'])->name('movies.index');
Route::get('/movies/form', [MoviesController::class, 'form'])->name('movies.form');
Route::post('/movies/create', [MoviesController::class, 'create']);
Route::delete('movies/borrar/{id}', [MoviesController::class, 'delete']);
Route::get('/movies/formedit/{id}', [MoviesController::class, 'formedit'])->name('movies.formedit');
Route::put('/movies/update', [MoviesController::class, 'update'])->name('movies.update');

Route::get('/schedules/get', [SchedulesController::class, 'getSchedules']);
Route::get('/schedules', [SchedulesController::class, 'index'])->name('schedules.index');
Route::get('/schedules/form', [SchedulesController::class, 'form'])->name('schedules.form');
Route::post('/schedules/create', [SchedulesController::class, 'create']);
Route::delete('schedules/borrar/{id}', [SchedulesController::class, 'delete']);
Route::get('/schedules/formedit/{id}', [SchedulesController::class, 'formedit']);
Route::put('/schedules/update', [SchedulesController::class, 'update']);

Route::get('/screenings', [ScreeningsController::class, 'index'])->name('screenings.index');
Route::get('/screenings/form', [ScreeningsController::class, 'form'])->name('screenings.form');
Route::post('/screenings/create', [ScreeningsController::class, 'create']);
Route::delete('screenings/borrar/{id}', [ScreeningsController::class, 'delete']);
Route::get('/screenings/formedit/{id}', [ScreeningsController::class, 'formedit']);
Route::put('/screenings/update', [ScreeningsController::class, 'update']);


Route::get('/cinemas/prueba', [CinemasController::class, 'prueba']);
Route::get('/cinemas', [CinemasController::class, 'index'])->name('cinemas.index');
Route::get('/cinemas/form', [CinemasController::class, 'form'])->name('cinemas.form');
Route::post('/cinemas/create', [CinemasController::class, 'create']);
Route::delete('cinemas/borrar/{id}', [CinemasController::class, 'delete']);
Route::get('/cinemas/formedit/{id}', [CinemasController::class, 'formedit']);
Route::put('/cinemas/update', [CinemasController::class, 'update']);

Route::get('/rooms', [RoomsController::class, 'index'])->name('rooms.index');
Route::get('/rooms/form', [RoomsController::class, 'form'])->name('rooms.form');
Route::post('/rooms/create', [RoomsController::class, 'create']);
Route::delete('rooms/borrar/{id}', [RoomsController::class, 'delete']);
Route::get('/rooms/formedit/{id}', [RoomsController::class, 'formedit']);
Route::put('/rooms/update', [RoomsController::class, 'update']);

Route::get('/sales', [SalesController::class, 'index'])->name('sales.index');
Route::get('/sales/form', [SalesController::class, 'form'])->name('sales.form');
Route::post('/sales/create', [SalesController::class, 'create']);
Route::delete('sales/borrar/{id}', [SalesController::class, 'delete']);
Route::get('/sales/formedit/{id}', [SalesController::class, 'formedit']);




Route::get('/cinemas/getrooms/{id}', [RoomsController::class, 'getrooms']);
Route::get('/rooms/getscreenings/{id}', [ScreeningsController::class, 'getscreenings']);
Route::get('/cinemas/{cinema}/rooms', [CinemasController::class, 'getRoomsByCinema']);
Route::get('/cinemas/{room}/screenings', [ScreeningsController::class, 'getScreeningsByRoom']);































