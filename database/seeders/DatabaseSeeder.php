<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ۱. ساخت کاربر ادمین برای تست
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'role' => 'admin',
        ]);

        // ۲. ساخت ۱۰ کاربر معمولی
        User::factory(10)->create();

        // ۳. ساخت ۸ دسته‌بندی که هرکدام ۵ محصول دارند
        Category::factory(8)
            ->has(Product::factory()->count(5))
            ->create();
    }
}
