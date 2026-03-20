@extends('layouts.main')

@section('title', 'Tìm kiếm tin tức')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4 mb-0">Kết quả tìm kiếm</h1>
        <span class="text-muted small">Từ khóa: "{{ $tuKhoa !== '' ? $tuKhoa : 'Tất cả' }}"</span>
    </div>

    <div class="row g-3">
        @forelse($listtin as $tin)
            <div class="col-md-6 col-lg-4">
                <article class="card h-100 shadow-sm news-card">
                    <a href="{{ route('tin.chitiet', ['id' => $tin->id]) }}">
                        <img
                            src="{{ $tin->hinh ?: 'https://via.placeholder.com/800x450?text=Search+News' }}"
                            alt="{{ $tin->tieuDe }}"
                            class="card-img-top"
                        >
                    </a>
                    <div class="card-body">
                        <div class="meta-text mb-1">{{ $tin->tenLoai }}</div>
                        <h2 class="h6">
                            <a class="text-decoration-none" href="{{ route('tin.chitiet', ['id' => $tin->id]) }}">
                                {{ $tin->tieuDe }}
                            </a>
                        </h2>
                        <p class="text-secondary small mb-2">{{ $tin->tomTat }}</p>
                        <div class="meta-text">
                            {{ \Illuminate\Support\Carbon::parse($tin->ngayDang)->format('d/m/Y H:i') }} |
                            {{ number_format($tin->xem) }} lượt xem
                        </div>
                    </div>
                </article>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning mb-0">Không tìm thấy bài viết phù hợp.</div>
            </div>
        @endforelse
    </div>

    <div class="mt-3">
        {{ $listtin->links() }}
    </div>
@endsection
