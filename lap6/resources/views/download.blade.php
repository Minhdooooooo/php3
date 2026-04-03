<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="max-w-2xl mx-auto mt-12 bg-white shadow rounded-lg p-6">
        <p class="text-lg">Chao ban <strong>{{ auth()->user()->name }}</strong>!</p>
        <p class="mt-2">Day la trang download software, chi danh cho thanh vien da dang nhap.</p>

        <form method="POST" action="{{ route('logout') }}" class="mt-6">
            @csrf
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                Thoat
            </button>
        </form>
    </div>
</body>
</html>
