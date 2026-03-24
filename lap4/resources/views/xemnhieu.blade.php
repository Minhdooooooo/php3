@extends('layouts.news')

@section('title', 'Tin xem nhiá»u')

@section('content')
    <h2 class="news-title">Top 10 tin xem nhiá»u nháº¥t</h2>

    @if($data->isEmpty())
        <p class="empty">KhÃ´ng cÃ³ dá»¯ liá»‡u Ä‘á»ƒ hiá»ƒn thá»‹.</p>
    @else
        @foreach($data as $tin)
            <article class="news-item">
                <h3 class="news-title">
                    <a href="{{ route('tin.chitiet', ['id' => $tin->id]) }}">{{ $tin->tieuDe }}</a>
                </h3>
                <p class="meta">LÆ°á»£t xem: {{ number_format((int) ($tin->xem ?? 0)) }}</p>
            </article>
        @endforeach
    @endif
@endsection
