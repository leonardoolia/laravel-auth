<?php

use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Guest\HomeController as GuestHomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
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

Route::get('/admin', AdminHomeController::class)->middleware(['auth', 'verified'])->name('admin.home');

Route::get('/admin/projects', [ProjectController::class, 'index'])->name('admin.projects.index')->middleware('auth');
Route::get('/admin/projects/create', [ProjectController::class, 'create'])->name('admin.projects.create')->middleware('auth');
Route::get('/admin/projects/{project}', [ProjectController::class, 'show'])->name('admin.projects.show')->middleware('auth');
Route::post('/admin/projects', [ProjectController::class, 'store'])->name('admin.projects.store')->middleware('auth');
Route::get('/admin/projects/{project}/edit', [ProjectController::class, 'edit'])->name('admin.projects.edit')->middleware('auth');
Route::put('/admin/projects/{project}/', [ProjectController::class, 'update'])->name('admin.projects.update')->middleware('auth');
Route::delete('/admin/projects/{project}', [ProjectController::class, 'destroy'])->name('admin.projects.destroy')->middleware('auth');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
