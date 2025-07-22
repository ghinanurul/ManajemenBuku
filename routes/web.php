<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;

// ✅ Redirect root "/" ke dashboard
Route::get('/', function () {
    return redirect()->route('login');
});

// ✅ Grup route untuk user yang sudah login
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // CRUD Buku
    Route::resource('books', BookController::class);

    // Export Laporan
    Route::get('/books/export/excel', [BookController::class, 'exportExcel'])->name('books.export.excel');
    Route::get('/books/export/pdf', [BookController::class, 'exportPDF'])->name('books.export.pdf');

    // Profil user
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

require __DIR__.'/auth.php';
