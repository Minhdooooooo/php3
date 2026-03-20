@extends('layouts.news')

@section('title', 'Tin moi')

@section('content')
    <h2 class="news-title">Top 10 tin moi nhat</h2>

    @if($data->isEmpty())
        <p class="empty">Khong co du lieu de hien thi.</p>
    @else
        @foreach($data as $tin)
            <article class="news-item">
                <h3 class="news-title">
                    <a href="{{ route('tin.chitiet', ['id' => $tin->id]) }}">{{ $tin->tieuDe }}</a>
                </h3>
                <p class="meta">Ngay dang: {{ $tin->ngayDang }}</p>
            </article>
        @endforeach
    @endif
@endsection
