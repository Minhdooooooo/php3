<!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Danh sach tin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 m-0">DANH SACH TIN</h1>
        <a href="/tin/them" class="btn btn-warning">Them tin</a>
    </div>

    @if($data->isEmpty())
        <div class="alert alert-info">Chua co du lieu.</div>
    @endif

    @foreach($data as $tin)
        <div class="border rounded p-3 mb-3">
            <h2 class="h5 mb-2">{{ $tin->tieuDe }}</h2>
            <p class="mb-2">{{ $tin->tomTat }}</p>
            <a href="/tin/capnhat/{{ $tin->id }}" class="me-3">Cap nhat</a>
            <a href="/tin/xoa/{{ $tin->id }}" onclick="return confirm('Ban chac chan muon xoa?')">Xoa</a>
        </div>
    @endforeach
</div>
</body>
</html>
