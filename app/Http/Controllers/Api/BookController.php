<?php

namespace App\Http\Controllers\Api;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\BookExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class BookController extends Controller
{
    public function index() {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create() {
        return view('books.create');
    }

    public function store(Request $request) {
        Book::create($request->all());
        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan');
    }

    public function edit(Book $book) {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book) {
        $book->update($request->all());
        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui');
    }

    public function destroy(Book $book) {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus');
    }

    public function exportExcel()
{
    return Excel::download(new BookExport, 'books.xlsx');
}


public function exportPDF()
{
    $books = Book::all();
    $pdf = Pdf::loadView('books.export-pdf', compact('books'));
    return $pdf->download('daftar_buku.pdf');
}

}

