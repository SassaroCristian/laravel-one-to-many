<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LaravelAuthModelController;

// Rotte pubbliche
Route::get('/', function () {
    return view('welcome');
});

// Rotte protette da autenticazione
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // CRUD per i progetti
    Route::resource('projects', LaravelAuthModelController::class);

});

require __DIR__ . '/auth.php';
