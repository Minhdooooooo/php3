@extends('layouts.main')

@section('title', 'Tin trong loại')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4 mb-0">Loại tin: {{ $loaiTin->tenLoai }}</h1>
        <span class="text-muted small">Tổng số: {{ $listtin->total() }} bài</span>
    </div>

    <div class="row g-3">
        @forelse($listtin as $tin)
            <div class="col-md-6 col-lg-4">
                <article class="card h-100 shadow-sm news-card">
                    <a href="{{ route('tin.chitiet', ['id' => $tin->id]) }}">
                        <img
                            src="{{ $tin->hinh ?: 'https://via.placeholder.com/800x450?text=Category+News' }}"
                            alt="{{ $tin->tieuDe }}"
                            class="card-img-top"
                        >
                    </a>
                    <div class="card-body">
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
            <p>Loại này chưa có bài viết.</p>
        @endforelse
    </div>

    <div class="mt-3">
        {{ $listtin->links() }}
    </div>
@endsection
