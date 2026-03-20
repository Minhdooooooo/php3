@extends('layouts.main')

@section('title', 'Trang chủ tin tức')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4 mb-0">Tin mới nhất</h1>
        <small class="text-muted">Chuyên đề tổng hợp</small>
    </div>

    <div class="row g-3">
        @forelse($tinMoiNhat as $tin)
            <div class="col-md-6 col-lg-4">
                <article class="card h-100 shadow-sm news-card">
                    <a href="{{ route('tin.chitiet', ['id' => $tin->id]) }}">
                        <img
                            src="{{ $tin->hinh ?: 'https://via.placeholder.com/800x450?text=News' }}"
                            alt="{{ $tin->tieuDe }}"
                            class="card-img-top"
                        >
                    </a>
                    <div class="card-body d-flex flex-column">
                        <div class="meta-text mb-2">
                            {{ $tin->tenLoai }} | {{ \Illuminate\Support\Carbon::parse($tin->ngayDang)->format('d/m/Y H:i') }}
                        </div>
                        <h2 class="h6">
                            <a class="text-decoration-none" href="{{ route('tin.chitiet', ['id' => $tin->id]) }}">
                                {{ $tin->tieuDe }}
                            </a>
                        </h2>
                        <p class="text-secondary small mb-0">{{ $tin->tomTat }}</p>
                    </div>
                    <div class="card-footer bg-white border-0 pt-0">
                        <span class="badge text-bg-light">Lượt xem: {{ number_format($tin->xem) }}</span>
                    </div>
                </article>
            </div>
        @empty
            <p>Chưa có dữ liệu tin tức.</p>
        @endforelse
    </div>
@endsection
