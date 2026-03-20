@extends('layouts.main')

@section('title', $tin->tieuDe)

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <article class="card shadow-sm news-card">
                <img
                    src="{{ $tin->hinh ?: 'https://via.placeholder.com/1200x600?text=News+Detail' }}"
                    alt="{{ $tin->tieuDe }}"
                    class="card-img-top"
                    style="max-height: 500px; object-fit: cover;"
                >
                <div class="card-body p-4">
                    <div class="meta-text mb-2">
                        {{ $tin->tenLoai }} |
                        {{ \Illuminate\Support\Carbon::parse($tin->ngayDang)->format('d/m/Y H:i') }} |
                        {{ number_format($tin->xem) }} lượt xem
                    </div>
                    <h1 class="h3 mb-3">{{ $tin->tieuDe }}</h1>
                    @if($tin->tomTat)
                        <p class="lead fs-6 text-secondary">{{ $tin->tomTat }}</p>
                    @endif
                    <hr>
                    <div>{!! $tin->noiDung !!}</div>
                </div>
            </article>
        </div>
    </div>
@endsection
