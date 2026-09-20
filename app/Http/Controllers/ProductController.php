<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    // ۱. دریافت لیست محصولات (با Eager Loading دسته‌بندی برای جلوگیری از N+1)
    public function index()
    {
        return Product::with('category')->latest()->paginate(15);
    }

    // در فایل ProductController.php متد store:
public function store(StoreProductRequest $request)
{
    $data = $request->validated();
    $data['slug'] = $data['slug'] ?? \Illuminate\Support\Str::slug($data['name']);

    $product = Product::create($data);
    return response()->json($product, 201);
}

    // ۳. نمایش جزئیات یک محصول
    public function show(Product $product)
    {
        return $product->load('category', 'images', 'reviews');
    }

    // ۴. به‌روزرسانی محصول
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        return response()->json($product, 200);
    }

    // ۵. حذف محصول
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->noContent();
    }
}