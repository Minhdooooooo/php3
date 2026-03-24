@extends('layouts.news')

@section('title', 'Tin má»›i')

@section('content')
    <h2 class="news-title">Top 10 tin má»›i nháº¥t</h2>

    @if($data->isEmpty())
        <p class="empty">KhÃ´ng cÃ³ dá»¯ liá»‡u Ä‘á»ƒ hiá»ƒn thá»‹.</p>
    @else
        @foreach($data as $tin)
            <article class="news-item">
                <h3 class="news-title">
                    <a href="{{ route('tin.chitiet', ['id' => $tin->id]) }}">{{ $tin->tieuDe }}</a>
                </h3>
                <p class="meta">NgÃ y Ä‘Äƒng: {{ $tin->ngayDang }}</p>
            </article>
        @endforeach
    @endif
@endsection
