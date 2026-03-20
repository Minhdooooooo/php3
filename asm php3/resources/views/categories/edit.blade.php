@extends('layouts.app')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@section ('title', "Sửa danh mục sản phẩm")

@section('content')
<div class="container">
    <h1>Sửa danh mục</h1>
    <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Tên danh mục</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="status">Trạng thái</label>
            <select class="form-control" id="status" name="status" required>
                <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Kích hoạt</option>
                <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>Vô hiệu hóa</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Cập nhật danh mục</button>
    </form>
</div>