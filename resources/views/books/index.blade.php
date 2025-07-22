@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold text-center mb-6 text-blue-700">📚 Daftar Buku</h1>

    <div class="overflow-x-auto bg-white rounded-lg shadow-md p-6">
        <table class="min-w-full table-auto border border-gray-200">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">Judul</th>
                    <th class="px-4 py-2">Penulis</th>
                    <th class="px-4 py-2">Tahun</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse ($books as $index => $book)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-2 text-center">{{ $index + 1 }}</td>
                        <td class="px-4 py-2">{{ $book->title }}</td>
                        <td class="px-4 py-2">{{ $book->author }}</td>
                        <td class="px-4 py-2">{{ $book->year }}</td>
                        <td class="px-4 py-2 text-center space-x-2">
                            <a href="{{ route('books.edit', $book->id) }}"
                               class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">Edit</a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Yakin ingin menghapus buku ini?')"
                                        class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">Belum ada data buku.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6 flex justify-between">
        <a href="{{ route('books.create') }}"
           class="bg-green-600 text-white px-5 py-2 rounded hover:bg-green-700">➕ Tambah Buku</a>

        <div class="space-x-2">
            <a href="{{ route('books.export.excel') }}"
               class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">⬇ Export Excel</a>
            <a href="{{ route('books.export.pdf') }}"
               class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">⬇ Export PDF</a>
        </div>
    </div>
</div>
@endsection
