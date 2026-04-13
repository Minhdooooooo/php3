<?php

namespace App\Http\Controllers;

use App\Http\Resources\LoaiSanPhamResource;
use App\Models\LoaiSanPham;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoaiSanPhamController extends Controller
{
    public function create(): JsonResponse
    {
        return response()->json([
            'status' => false,
            'message' => 'API does not support create view.',
            'data' => [],
        ], 405);
    }

    public function index(): JsonResponse
    {
        $loais = LoaiSanPham::query()->latest('id')->get();

        $arr = [
            'status' => true,
            'message' => 'Danh sach loai san pham',
            'data' => LoaiSanPhamResource::collection($loais),
        ];

        return response()->json($arr, 200);
    }

    public function store(Request $request): JsonResponse
    {
        $input = $request->only(['tenLoai', 'moTa', 'anHien']);
        $input['anHien'] = (int) ($input['anHien'] ?? 1);

        $validator = Validator::make($input, [
            'tenLoai' => 'required|string|max:255',
            'moTa' => 'nullable|string|max:255',
            'anHien' => 'required|integer|in:0,1',
        ]);

        if ($validator->fails()) {
            $arr = [
                'success' => false,
                'message' => 'Loi kiem tra du lieu',
                'data' => $validator->errors(),
            ];

            return response()->json($arr, 200);
        }

        $loaiSanPham = LoaiSanPham::query()->create($input);

        $arr = [
            'status' => true,
            'message' => 'Loai san pham da luu thanh cong',
            'data' => new LoaiSanPhamResource($loaiSanPham),
        ];

        return response()->json($arr, 201);
    }

    public function show(string $id): JsonResponse
    {
        $loaiSanPham = LoaiSanPham::query()->find($id);

        if ($loaiSanPham === null) {
            $arr = [
                'success' => false,
                'message' => 'Khong co loai san pham nay',
                'data' => [],
            ];

            return response()->json($arr, 200);
        }

        $arr = [
            'status' => true,
            'message' => 'Chi tiet loai san pham',
            'data' => new LoaiSanPhamResource($loaiSanPham),
        ];

        return response()->json($arr, 201);
    }

    public function update(Request $request, LoaiSanPham $loaisanpham): JsonResponse
    {
        $input = $request->only(['tenLoai', 'moTa', 'anHien']);
        $input['anHien'] = (int) ($input['anHien'] ?? $loaisanpham->anHien);

        $validator = Validator::make($input, [
            'tenLoai' => 'required|string|max:255',
            'moTa' => 'nullable|string|max:255',
            'anHien' => 'required|integer|in:0,1',
        ]);

        if ($validator->fails()) {
            $arr = [
                'success' => false,
                'message' => 'Loi kiem tra du lieu',
                'data' => $validator->errors(),
            ];

            return response()->json($arr, 200);
        }

        $loaisanpham->tenLoai = $input['tenLoai'];
        $loaisanpham->moTa = $input['moTa'] ?? null;
        $loaisanpham->anHien = $input['anHien'];
        $loaisanpham->save();

        $arr = [
            'status' => true,
            'message' => 'Loai san pham cap nhat thanh cong',
            'data' => new LoaiSanPhamResource($loaisanpham),
        ];

        return response()->json($arr, 200);
    }

    public function destroy(LoaiSanPham $loaisanpham): JsonResponse
    {
        $loaisanpham->delete();

        $arr = [
            'status' => true,
            'message' => 'Loai san pham da duoc xoa',
            'data' => [],
        ];

        return response()->json($arr, 200);
    }

    public function edit(LoaiSanPham $loaisanpham): JsonResponse
    {
        return response()->json([
            'status' => false,
            'message' => 'API does not support edit view.',
            'data' => [],
        ], 405);
    }
}
