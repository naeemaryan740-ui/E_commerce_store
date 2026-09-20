<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'parent_id',
    ];

    // هر دسته‌بندی می‌تواند چندین محصول داشته باشد
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // رابطه برای دسته‌بندی والد (در صورت وجود زیردسته‌ها)
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // رابطه برای زیردسته‌ها
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}