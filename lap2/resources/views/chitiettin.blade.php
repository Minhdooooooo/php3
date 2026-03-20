@extends('layouts.news')

@section('title', 'Chi tiet tin')

@section('content')
    <article>
        <h2 class="news-title">{{ $tin->tieuDe }}</h2>

        @if(!empty($tin->ngayDang))
            <p class="meta">Ngay dang: {{ $tin->ngayDang }}</p>
        @endif

        @if(!empty($tin->tomTat))
            <p class="summary"><strong>Tom tat:</strong> {{ $tin->tomTat }}</p>
        @endif

        <div class="detail-body">{!! $tin->noiDung !!}</div>
    </article>
@endsection
