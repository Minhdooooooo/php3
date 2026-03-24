@extends('layout')

@section('tieudetrang')
    {{ $tenLoai }}
@endsection

@section('noidung')
    <h2 class="section-title">Chuyên mục: {{ $tenLoai }}</h2>
    <p class="section-subtitle">Danh sách bài viết mới nhất trong chuyên mục này.</p>

    @forelse ($listtin as $t)
        <article class="news-card">
            <h3 class="news-card-title">
                <a href="{{ route('tin.chitiet', ['id' => $t->id]) }}">{{ $t->tieuDe }}</a>
            </h3>

            @if (!empty($t->tomTat))
                <p class="news-card-summary">{{ $t->tomTat }}</p>
            @endif

            @if (!empty($t->ngayDang))
                <p class="news-card-meta">Đăng ngày: {{ \Illuminate\Support\Carbon::parse($t->ngayDang)->format('d/m/Y') }}</p>
            @endif
        </article>
    @empty
        <p class="empty-state">Hiện chưa có tin trong chuyên mục này.</p>
    @endforelse
@endsection
