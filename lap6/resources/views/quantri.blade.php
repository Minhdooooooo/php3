<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Quan Tri</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="max-w-2xl mx-auto mt-12 bg-white shadow rounded-lg p-6">
        <p>Chao ban <strong>{{ auth()->user()->name }}</strong></p>
        <p class="mt-2">Day la trang quan tri chi danh cho admin.</p>
    </div>
</body>
</html>
