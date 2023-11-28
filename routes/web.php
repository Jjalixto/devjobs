<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacanteController;
use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificacionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',HomeController::class)->name('home');

Route::get('/dashboard', [VacanteController::class,'index'])->middleware(['auth', 'verified','rol.reclutador'])->name('vacantes.index');

Route::get('/vacantes/create', [VacanteController::class,'create'])->middleware(['auth', 'verified'])->name('vacantes.create');
Route::get('/vacantes/{vacante}/edit', [VacanteController::class,'edit'])->middleware(['auth', 'verified'])->name('vacantes.edit');
Route::get('/vacantes/{vacante}', [VacanteController::class,'show'])->name('vacantes.show');
Route::get('/candidatos/{vacante}',[CandidatoController::class,'index'])->name('candidatos.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});

//notificaciones
//al tener solo un metodo no es necesario pasar mas metodos
Route::get('notificaciones',NotificacionController::class)->middleware(['auth', 'verified','rol.reclutador'])->name('notificaciones');

require __DIR__.'/auth.php';
