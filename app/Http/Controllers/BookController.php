<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BookExport;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
    $books = Book::all();
    return view('books.index', compact('books'));
}

public function create() {
    return view('books.create');
}

public function store(Request $request) {
    Book::create($request->all());
    return redirect()->route('books.index');
}

public function edit(Book $book) {
    return view('books.edit', compact('book'));
}

public function update(Request $request, Book $book) {
    $book->update($request->all());
    return redirect()->route('books.index');
}

public function destroy(Book $book) {
    $book->delete();
    return redirect()->route('books.index');
}

public function exportExcel() {
    return Excel::download(new BookExport, 'books.xlsx');
}

public function exportPDF() {
    $books = Book::all();
    $pdf = PDF::loadView('books.pdf', compact('books'));
    return $pdf->download('books.pdf');
}

}
