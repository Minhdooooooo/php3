@extends('layouts.news')

@section('title', 'Tin trong loai')

@section('content')
    <h2 class="news-title">TIN TRONG LOAI {{ $tenLoai }}</h2>
    <p class="meta">Loai ID: {{ $idLoai }}</p>

    @if($data->isEmpty())
        <p class="empty">Khong co tin nao trong loai nay.</p>
    @else
        @foreach($data as $tin)
            <article class="news-item">
                <h3 class="news-title">
                    <a href="{{ route('tin.chitiet', ['id' => $tin->id]) }}">{{ $tin->tieuDe }}</a>
                </h3>
                <p class="summary">{{ $tin->tomTat }}</p>
                <p class="meta">Ngay dang: {{ $tin->ngayDang }}</p>
            </article>
        @endforeach
    @endif
@endsection
