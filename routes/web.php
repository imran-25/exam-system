<?php

use App\Http\Controllers\LevelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/levels', [LevelController::class, 'index'])->name('levels.index');
    Route::get('/levels/create', [LevelController::class, 'create'])->name('level.create');
    Route::get('/levels/edit', [LevelController::class, 'edit'])->name('level.edit');
    Route::post('/levels/update', [LevelController::class, 'update'])->name('levels.update');
    Route::get('/levels/destroy', [LevelController::class, 'destroy'])->name('levels.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/subjects', [SubjectController::class, 'index'])->name('subjects.index');
    Route::get('/subjects/create', [ProfileController::class, 'create'])->name('subjects.create');
    Route::get('/subjects/edit', [ProfileController::class, 'edit'])->name('subjects.edit');
    Route::get('/subjects/update', [ProfileController::class, 'update'])->name('subjects.update');
    Route::get('/subjects/destroy', [LevelController::class, 'destroy'])->name('subjects.destroy');
});

require __DIR__ . '/auth.php';
