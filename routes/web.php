<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PerroController;
use App\Http\Controllers\RazaController;
use App\Http\Controllers\UserController;


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

require __DIR__ . '/auth.php';
Route::get('', function () {
    return Inertia::render('Auth/Login', [
        'canLogin' => Route::has('login'),
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::get('Administradores', function () {
    //     return Inertia::render('Administradores/Index');
    // });
    
    Route::resource('users', UserController::class);

    Route::controller(UserController::class)->group(function () {
        Route::get('/Administradores/Index', [UserController::class, 'administradores'])->name('administradores.index');
        Route::get('/Administradores/create', function () {return Inertia::render('Administradores/Create');})->name('administradores.create');
     
        Route::get('/Duenos/Index', [UserController::class, 'duenos'])->name('duenos.index');
        Route::get('/Duenos/create', function () {return Inertia::render('Duenos/Create');})->name('duenos.create');
    });
 
    Route::controller(PerroController::class)->group(function () {
        Route::get('/perros', [PerroController::class, 'index'])->name('perros.index');
        Route::get('/perros/create', [PerroController::class, 'create'])->name('perros.create');
        Route::post('/perros', [PerroController::class, 'store']);
        Route::get('/perros/{id}/edit', [PerroController::class, 'edit']);
        Route::post('/perros/{id}', [PerroController::class, 'update']);
        Route::get('/perros/{id}', [PerroController::class, 'destroy'])->name('perros.destroy');

    });
     

    Route::controller(RazaController::class)->group(function () {
        Route::get('/razas', [RazaController::class, 'index'])->name('razas.index');
        Route::get('/razas/create', [RazaController::class, 'create'])->name('razas.create');
        Route::post('/razas', [RazaController::class, 'store']);
        Route::get('/razas/{id}', [RazaController::class, 'destroy'])->name('razas.destroy');

    });

});

require __DIR__ . '/auth.php';
