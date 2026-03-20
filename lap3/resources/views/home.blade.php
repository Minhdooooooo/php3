@extends('layout')

@section('tieudetrang')
    Trang chủ tin tức
@endsection

@section('noidung')
    @php
        $noiBatQuery = \Illuminate\Support\Facades\DB::table('loaitin')->select('id');

        if (\Illuminate\Support\Facades\Schema::hasColumn('loaitin', 'ten')) {
            $noiBatQuery->addSelect('ten');
        } elseif (\Illuminate\Support\Facades\Schema::hasColumn('loaitin', 'tenLoai')) {
            $noiBatQuery->addSelect('tenLoai as ten');
        } elseif (\Illuminate\Support\Facades\Schema::hasColumn('loaitin', 'tenTL')) {
            $noiBatQuery->addSelect('tenTL as ten');
        } else {
            $noiBatQuery->addSelect(\Illuminate\Support\Facades\DB::raw("CONCAT('Loại ', id) as ten"));
        }

        if (\Illuminate\Support\Facades\Schema::hasColumn('loaitin', 'AnHien')) {
            $noiBatQuery->where('AnHien', 1);
        }

        if (\Illuminate\Support\Facades\Schema::hasColumn('loaitin', 'thuTu')) {
            $noiBatQuery->orderBy('thuTu', 'asc');
        } else {
            $noiBatQuery->orderBy('id', 'asc');
        }

        $chuyenMucNoiBat = $noiBatQuery->limit(3)->get();

        $nhanHienThi = [
            'Cong nghe' => 'Công nghệ',
            'Doi song' => 'Đời sống',
            'The thao' => 'Thể thao',
        ];

        $moTaNoiBat = [
            'Cong nghe' => 'Xu hướng AI, lập trình và các công cụ tăng tốc công việc số.',
            'Công nghệ' => 'Xu hướng AI, lập trình và các công cụ tăng tốc công việc số.',
            'Doi song' => 'Gợi ý sống cân bằng, chăm sóc bản thân và kỹ năng thường ngày.',
            'Đời sống' => 'Gợi ý sống cân bằng, chăm sóc bản thân và kỹ năng thường ngày.',
            'The thao' => 'Lịch thi đấu, điểm nhấn trận đấu và các chủ đề đang được quan tâm.',
            'Thể thao' => 'Lịch thi đấu, điểm nhấn trận đấu và các chủ đề đang được quan tâm.',
        ];
    @endphp

    <section class="home-intro">
        <p class="home-kicker">Xin chào bạn đọc</p>
        <h2 class="section-title">Đây là trang chủ</h2>
        <p class="section-subtitle">
            Giao diện mới tập trung vào khả năng đọc nhanh, bố cục thoáng và dễ theo dõi trên mọi màn hình.
        </p>
    </section>

    <div class="highlight-grid">
        @forelse ($chuyenMucNoiBat as $muc)
            @php
                $tenMuc = trim((string) ($muc->ten ?? ('Loại ' . $muc->id)));
                $tenHienThi = $nhanHienThi[$tenMuc] ?? $tenMuc;
                $moTa = $moTaNoiBat[$tenMuc] ?? 'Cập nhật các bài viết mới nhất trong chuyên mục này.';
            @endphp
            <a class="highlight-card" href="{{ route('tin.trongloai', ['id' => $muc->id]) }}">
                <h3>{{ $tenHienThi }}</h3>
                <p>{{ $moTa }}</p>
            </a>
        @empty
            <div class="empty-state">Hiện chưa có chuyên mục để hiển thị.</div>
        @endforelse
    </div>
@endsection
