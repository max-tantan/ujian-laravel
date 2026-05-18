<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

            return response()->json([
                'success' => "true",
                'message' => "List Data Products",
                'data' => $products
            ], 200);
    }
    public function show(Product $products)
    {
        return response()->json([
            'success' => "true",
            'message' => "Detail Data Product",
            'data' => $products
        ], 200);
    }
    public function store(Request $request)
    {
        //validasi data
        $request->validate([
            'name' => 'required|max:25',
            'price' => 'required|integer',
            'description' => 'required|max:255',
        ]);
        //ambil input
        $product = Product::create($request->all());
        //simpan ke database
        return response()->json([
            'success' => "true",
            'message' => "Product created successfully",
            'data' => $product
        ], 201);
    }
}
