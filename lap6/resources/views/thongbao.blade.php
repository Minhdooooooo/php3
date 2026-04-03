<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thong Bao</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="max-w-2xl mx-auto mt-12 bg-white shadow rounded-lg p-6">
        <h1 class="text-2xl font-bold text-red-600">Khong co quyen truy cap</h1>
        <p class="mt-3">Tai khoan cua ban khong thuoc nhom quan tri.</p>
        <a class="underline text-blue-700 mt-4 inline-block" href="{{ url('/download') }}">Quay ve trang download</a>
    </div>
</body>
</html>
