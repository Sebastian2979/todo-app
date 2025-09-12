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

Route::get('/probe2', function () {
    $count = session('count', 0) + 1;
    session(['count' => $count]);

    return response()->json([
        'secure'       => request()->isSecure(),
        'has_cookie'   => request()->hasCookie('laravel_session'),
        'count'        => $count, // sollte bei jedem Reload um 1 steigen
        'set_cookie?'  => 'Sieh in DevTools → Network → probe2 → Response Headers nach: Set-Cookie',
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
