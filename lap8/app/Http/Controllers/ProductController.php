<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
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
        $products = Product::query()->latest('id')->get();

        $arr = [
            'status' => true,
            'message' => 'Danh sach san pham',
            'data' => ProductResource::collection($products),
        ];

        return response()->json($arr, 200);
    }

    public function store(Request $request): JsonResponse
    {
        $input = $request->only(['tenSP', 'gia', 'anHien']);
        $input['anHien'] = (int) ($input['anHien'] ?? 1);

        $validator = Validator::make($input, [
            'tenSP' => 'required|string|max:255',
            'gia' => 'required|integer|min:0',
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

        $product = Product::query()->create($input);

        $arr = [
            'status' => true,
            'message' => 'San pham da luu thanh cong',
            'data' => new ProductResource($product),
        ];

        return response()->json($arr, 201);
    }

    public function show(string $id): JsonResponse
    {
        $product = Product::query()->find($id);

        if ($product === null) {
            $arr = [
                'success' => false,
                'message' => 'Khong co san pham nay',
                'data' => [],
            ];

            return response()->json($arr, 200);
        }

        $arr = [
            'status' => true,
            'message' => 'Chi tiet san pham',
            'data' => new ProductResource($product),
        ];

        return response()->json($arr, 201);
    }

    public function update(Request $request, Product $product): JsonResponse
    {
        $input = $request->only(['tenSP', 'gia', 'anHien']);
        $input['anHien'] = (int) ($input['anHien'] ?? $product->anHien);

        $validator = Validator::make($input, [
            'tenSP' => 'required|string|max:255',
            'gia' => 'required|integer|min:0',
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

        $product->tenSP = $input['tenSP'];
        $product->gia = $input['gia'];
        $product->anHien = $input['anHien'];
        $product->save();

        $arr = [
            'status' => true,
            'message' => 'San pham cap nhat thanh cong',
            'data' => new ProductResource($product),
        ];

        return response()->json($arr, 200);
    }

    public function destroy(Product $product): JsonResponse
    {
        $product->delete();

        $arr = [
            'status' => true,
            'message' => 'San pham da duoc xoa',
            'data' => [],
        ];

        return response()->json($arr, 200);
    }

    public function edit(Product $product): JsonResponse
    {
        return response()->json([
            'status' => false,
            'message' => 'API does not support edit view.',
            'data' => [],
        ], 405);
    }
}
