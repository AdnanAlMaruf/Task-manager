<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [TaskController::class, 'user'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('tasks', TaskController::class);
    Route::patch('/tasks/{task}/toggle-client', [TaskController::class, 'toggleClientVisibility'])->name('tasks.toggleClient');

});

Route::middleware(['auth', 'role:agent'])->group(function(){
    Route::get('agent/dashboard', [AgentController::class, 'dashboard'])->name('client.dashboard');
        Route::get('/tasks', [TaskController::class, 'agentTasks'])->name('client.tasks');
});

require __DIR__.'/auth.php';