<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Trang tin tức')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f3f7ff 0%, #eefaf3 100%);
            min-height: 100vh;
        }

        .news-card {
            border-radius: 12px;
            overflow: hidden;
        }

        .news-card img {
            height: 210px;
            object-fit: cover;
        }

        .meta-text {
            font-size: 0.875rem;
            color: #6c757d;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="{{ route('home') }}">NewsSite</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Trang chủ</a>
                </li>
                @foreach($loaiTinMenu as $loai)
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('tin.trongloai') && (int) request()->route('id') === (int) $loai->id ? 'active' : '' }}"
                           href="{{ route('tin.trongloai', ['id' => $loai->id]) }}">
                            {{ $loai->tenLoai }}
                        </a>
                    </li>
                @endforeach
            </ul>

            <form class="d-flex" action="{{ route('tin.timkiem') }}" method="get">
                <input class="form-control form-control-sm me-2" type="search" name="q" placeholder="Tìm tin..." value="{{ request('q') }}">
                <button class="btn btn-sm btn-outline-primary" type="submit">Tìm</button>
            </form>
        </div>
    </div>
</nav>

<main class="py-4">
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
