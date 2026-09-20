<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    // ۱. دریافت لیست تمام دسته‌بندی‌ها (به همراه تعداد محصولات برای جلوگیری از N+1)
    public function index()
    {
        return Category::withCount('products')->latest()->paginate(10);
    }

    // ۲. ذخیره دسته‌بندی جدید (Status Code: 201)
    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();
        
        // اگر اسلاگ ارسال نشده بود، خودکار از روی نام ساخته شود
        $data['slug'] = $data['slug'] ?? Str::slug($data['name']);

        $category = Category::create($data);
        return response()->json($category, 201);
    }

    // ۳. نمایش یک دسته‌بندی خاص به همراه محصولات آن (Status Code: 200)
    public function show(Category $category)
    {
        return $category->load('products');
    }

    // ۴. به‌روزرسانی دسته‌بندی (Status Code: 200)
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data = $request->validated();

        if (isset($data['name']) && !isset($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        $category->update($data);
        return response()->json($category, 200);
    }

    // ۵. حذف دسته‌بندی (Status Code: 204)
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->noContent();
    }
}