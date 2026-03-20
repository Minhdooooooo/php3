@php
    $menuQuery = \Illuminate\Support\Facades\DB::table('loaitin')->select('id');

    if (\Illuminate\Support\Facades\Schema::hasColumn('loaitin', 'ten')) {
        $menuQuery->addSelect('ten');
    } elseif (\Illuminate\Support\Facades\Schema::hasColumn('loaitin', 'tenLoai')) {
        $menuQuery->addSelect('tenLoai as ten');
    } elseif (\Illuminate\Support\Facades\Schema::hasColumn('loaitin', 'tenTL')) {
        $menuQuery->addSelect('tenTL as ten');
    } else {
        $menuQuery->addSelect(\Illuminate\Support\Facades\DB::raw("CONCAT('Loại ', id) as ten"));
    }

    if (\Illuminate\Support\Facades\Schema::hasColumn('loaitin', 'AnHien')) {
        $menuQuery->where('AnHien', 1);
    }

    if (\Illuminate\Support\Facades\Schema::hasColumn('loaitin', 'thuTu')) {
        $menuQuery->orderBy('thuTu', 'asc');
    } else {
        $menuQuery->orderBy('id', 'asc');
    }

    $loaitinArr = $menuQuery->limit(6)->get();

    $nhanHienThi = [
        'Cong nghe' => 'Công nghệ',
        'Doi song' => 'Đời sống',
        'The thao' => 'Thể thao',
        'Giai tri' => 'Giải trí',
        'Suc khoe' => 'Sức khỏe',
        'The gioi' => 'Thế giới',
        'Phap luat' => 'Pháp luật',
    ];
@endphp

<div class="menu-root">
    <a class="menu-brand" href="{{ route('home') }}">
        <span class="menu-brand-badge">LA</span>
        <span>Tin tức 24h</span>
    </a>

    <ul class="menu-list">
        <li>
            <a class="menu-link {{ request()->routeIs('home') ? 'is-active' : '' }}" href="{{ route('home') }}">Trang chủ</a>
        </li>

        @foreach ($loaitinArr as $lt)
            @php
                $tenChuyenMuc = trim((string) ($lt->ten ?? ('Loại ' . $lt->id)));
                $tenHienThi = $nhanHienThi[$tenChuyenMuc] ?? $tenChuyenMuc;
                $isActive = request()->routeIs('tin.trongloai') && (int) request()->route('id') === (int) $lt->id;
            @endphp
            <li>
                <a class="menu-link {{ $isActive ? 'is-active' : '' }}" href="{{ route('tin.trongloai', ['id' => $lt->id]) }}">
                    {{ $tenHienThi }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
