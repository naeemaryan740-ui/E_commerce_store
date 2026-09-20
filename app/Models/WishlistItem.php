<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishlistItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
    ];

    // هر آیتم لیست علاقه‌مندی متعلق به یک کاربر است
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // هر آیتم لیست علاقه‌مندی مربوط به یک محصول است
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
