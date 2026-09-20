<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'sku',
        'description',
        'price',
        'stock',
        'is_active',
    ];

    // هر محصول متعلق به یک دسته‌بندی است
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // هر محصول می‌تواند چندین تصویر داشته باشد
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    // هر محصول می‌تواند در چندین آیتم سبد خرید باشد
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    // هر محصول می‌تواند در چندین آیتم سفارش باشد
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // هر محصول می‌تواند چندین نظر (Review) داشته باشد
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
