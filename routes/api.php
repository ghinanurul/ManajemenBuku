<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookController;

Route::get('/books', [BookController::class, 'index']);
Route::post('/books', [BookController::class, 'store']);
Route::get('/books/{book}', [BookController::class, 'show']);
Route::put('/books/{book}', [BookController::class, 'update']);
Route::delete('/books/{book}', [BookController::class, 'destroy']);
Route::get('/books-export-excel', [BookController::class, 'exportExcel']);
Route::get('/books-export-pdf', [BookController::class, 'exportPDF']);
Route::apiResource('books', BookApiController::class);
