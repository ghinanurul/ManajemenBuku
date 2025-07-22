<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Buku</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    @include('layouts.navbar')
    <main class="pt-4">
        @yield('content')
    </main>

    <div class="text-center text-sm text-gray-500 mt-10 mb-5">
    Ghina Nurul Ardhiani - 22552011141 - Teknik Informatika
</div>

</body>
</html>
