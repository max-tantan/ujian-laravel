<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(): JsonResponse
    {
        $products = Product::all();

        return response()->json([
            'success' => 'true',
            'message' => 'List Data Products',
            'data' => $products,
        ], 200);
    }

    public function show(Product $product): JsonResponse
    {
        return response()->json([
            'success' => 'true',
            'message' => 'Detail Data Product',
            'data' => $product,
        ], 200);
    }

    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|max:25',
            'price' => 'required|integer',
            'description' => 'required|max:255',
        ]);

        $product = Product::create($validatedData);

        return response()->json([
            'success' => 'true',
            'message' => 'Product created successfully',
            'data' => $product,
        ], 201);
    }

    public function destroy(Product $product): JsonResponse
    {
        $product->delete();

        return response()->json([
            'success' => 'true',
            'message' => 'product deleted successfully',
        ], 200);
    }
}
