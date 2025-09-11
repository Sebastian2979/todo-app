<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/probe', function () {
    session(['probe' => now()->toDateTimeString()]);
    return response()->json([
        'secure' => request()->isSecure(),
        'proto'  => request()->header('x-forwarded-proto'),
        'host'   => request()->header('host'),
        'port'   => request()->header('x-forwarded-port'),
        'session' => session('probe'),
    ]);
});

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', [TaskController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


Route::patch('/tasks/{task}/toggle', [TaskController::class, 'toggleCompleted'])->name('tasks.toggle');


Route::middleware('auth')->group(function () {
    
    Route::resource('tasks', TaskController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
