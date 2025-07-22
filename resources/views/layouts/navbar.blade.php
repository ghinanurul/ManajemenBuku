<nav class="bg-blue-700 p-4 shadow">
    <div class="container mx-auto flex justify-between items-center">
        <span class="text-white text-xl font-semibold">📘 Manajemen Buku</span>
        <div class="flex items-center space-x-6">
            <a href="{{ route('dashboard') }}" class="text-white hover:underline">Dashboard</a>
            <a href="{{ route('books.index') }}" class="text-white hover:underline">Kelola Buku</a>

            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-white hover:underline">Logout</button>
            </form>
        </div>
    </div>
</nav>
