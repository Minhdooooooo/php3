<!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cap nhat tin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container py-4" style="max-width: 760px;">
    <h1 class="h3 mb-3">Cap nhat tin</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="/tin/capnhat/{{ $tin->id }}" method="post" class="d-grid gap-3">
        @csrf

        <div>
            <label for="tieuDe" class="form-label">Tieu de</label>
            <input id="tieuDe" name="tieuDe" class="form-control" value="{{ old('tieuDe', $tin->tieuDe) }}" required>
        </div>

        <div>
            <label for="tomTat" class="form-label">Tom tat</label>
            <textarea id="tomTat" name="tomTat" class="form-control" rows="4">{{ old('tomTat', $tin->tomTat) }}</textarea>
        </div>

        <div>
            <label for="urlHinh" class="form-label">urlHinh</label>
            <input id="urlHinh" name="urlHinh" class="form-control" value="{{ old('urlHinh', $tin->urlHinh) }}">
        </div>

        <div>
            <label for="idLT" class="form-label">idLT</label>
            <select id="idLT" name="idLT" class="form-select" required>
                @foreach($loaiTin as $lt)
                    <option value="{{ $lt->id }}" @selected((int) old('idLT', $tin->idLT) === $lt->id)>
                        {{ $lt->id }} - {{ $lt->tenLoai }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-warning">Luu cap nhat</button>
            <a href="/tin/ds" class="btn btn-outline-secondary">Quay lai</a>
        </div>
    </form>
</div>
</body>
</html>
