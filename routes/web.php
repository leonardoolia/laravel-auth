<?php

use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Guest\HomeController as GuestHomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Guest\ProjectController as GuestProjectController;
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

Route::get('/', GuestHomeController::class)->name('guest.home');

// Rotta per i guest per vedere i singoli progetti
Route::get('/projects/{project}', [GuestProjectController::class, 'show'])->name('guest.projects.show');

Route::prefix('/admin')->name('admin.')->middleware('auth')->group(function () {
    //? Rotta admin home
    Route::get('', AdminHomeController::class)->name('home');

    // Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    // Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    // Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
    // Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    // Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    // Route::put('/projects/{project}/', [ProjectController::class, 'update'])->name('projects.update');
    // Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');

    //? Registrare tutte le rotte crud:
    Route::resource('projects', AdminProjectController::class);
});

//? Rotte profilo
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
