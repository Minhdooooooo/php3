@extends('layouts.news')

@section('title', 'Chi tiáº¿t tin')

@section('content')
    <article>
        <h2 class="news-title">{{ $tin->tieuDe }}</h2>

        @if(!empty($tin->ngayDang))
            <p class="meta">NgÃ y Ä‘Äƒng: {{ $tin->ngayDang }}</p>
        @endif

        @if(!empty($tin->tomTat))
            <p class="summary"><strong>TÃ³m táº¯t:</strong> {{ $tin->tomTat }}</p>
        @endif

        <div class="detail-body">{!! $tin->noiDung !!}</div>
    </article>
@endsection
