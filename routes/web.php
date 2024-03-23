<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\SemestreController;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\ProfesseurController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\GroupesemestreController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\SeanceController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard',[DashboardController::class ,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth','checkRole:admin'])->group(function () {
    Route::resource('module', ModuleController::class);
    Route::resource('semestre', SemestreController::class);
    Route::resource('groupe', GroupeController::class);
    Route::resource('etudiant', EtudiantController::class);
    Route::resource('professeur', ProfesseurController::class);
    Route::resource('local', LocalController::class);
    Route::resource('matiere', MatiereController::class);
    Route::resource('user', UserController::class);
});

Route::middleware(['auth','checkRole:fonctionnaire'])->group(function () {
    Route::resource('seance', SeanceController::class);
    Route::get('/emploi',[GroupesemestreController::class,'create'])->name('emploi.create');
    Route::post('/emploi', [GroupesemestreController::class, 'store'])->name('emploi.store');
    Route::get('/emploi/{semestre}/{groupe}',[GroupesemestreController::class,'index'])->name('emploi.index');
    Route::get('/Exportemploi/{semestre}/{groupe}',[GroupesemestreController::class,'exportPDF'])->name('emploisPDF');
    // Route::get('/seance', [SeanceController::class, 'index'])->name('seance.index');
    // Route::get('/seance/{seance}', [SeanceController::class, 'edit'])->name('seance.edit');
    // Route::patch('/seance', [SeanceController::class, 'update'])->name('seance.update');
    // Route::delete('/seance', [SeanceController::class, 'destroy'])->name('seance.destroy');
});

require __DIR__.'/auth.php';