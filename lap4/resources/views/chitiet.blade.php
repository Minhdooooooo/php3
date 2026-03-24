@extends('layout')

@section('tieudetrang')
    {{ $tin->tieuDe }}
@endsection

@section('noidung')
    <article class="detail-article">
        <h2 class="detail-title">{{ $tin->tieuDe }}</h2>

        @if (!empty($tin->tomTat))
            <p class="detail-summary">{{ $tin->tomTat }}</p>
        @endif

        @if (!empty($tin->ngayDang))
            <p class="news-card-meta">Đăng ngày: {{ \Illuminate\Support\Carbon::parse($tin->ngayDang)->format('d/m/Y H:i') }}</p>
        @endif

        <div class="detail-content">
            {!! $tin->noiDung !!}
        </div>
    </article>
@endsection
