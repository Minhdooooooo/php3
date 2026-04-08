<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhập Sinh Viên</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
@include('partials.topnav')

<div class="container mt-4">
    <div class="col-8 mx-auto">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" class="p-3 border border-primary" action="{{ route('sv_store') }}">
            @csrf
            <h3 class="bg-info p-2 m-0 text-white">NHẬP THÔNG TIN SINH VIÊN</h3>

            <div class="form-group row mt-3">
                <label class="col-3">Mã SV</label>
                <div class="col-9">
                    <input value="{{ old('masv') }}" type="text" class="form-control" name="masv">
                    @error('masv')
                        <span class="badge badge-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-3">Họ tên</label>
                <div class="col-9">
                    <input value="{{ old('hoten') }}" type="text" class="form-control" name="hoten">
                    @error('hoten')
                        <span class="badge badge-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-3">Tuổi</label>
                <div class="col-9">
                    <input value="{{ old('tuoi') }}" type="text" class="form-control" name="tuoi">
                    @error('tuoi')
                        <span class="badge badge-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-3">Ngày sinh</label>
                <div class="col-9">
                    <input value="{{ old('ngaysinh') }}" type="text" class="form-control" name="ngaysinh" placeholder="dd/mm (ví dụ: 02/04)">
                    @error('ngaysinh')
                        <span class="badge badge-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-3">CMND</label>
                <div class="col-9">
                    <input value="{{ old('cmnd') }}" type="text" class="form-control" name="cmnd">
                    @error('cmnd')
                        <span class="badge badge-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-3">Email</label>
                <div class="col-9">
                    <input value="{{ old('email') }}" type="text" class="form-control" name="email">
                    @error('email')
                        <span class="badge badge-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary w-25">Xử lý</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>

</html>