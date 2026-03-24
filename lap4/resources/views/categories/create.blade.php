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

@section ('title', "Thêm danh mục sản phẩm")

@section('content')
<div class="container">
    <h1>Thêm danh mục</h1>
    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Tên danh mục</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="status">Trạng thái</label>
            <input type="text" class="form-control" id="status" name="status" value="1">
        </div>
        <button type="submit" class="btn btn-success">Thêm danh mục</button>
    </form>
</div>