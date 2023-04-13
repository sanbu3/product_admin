<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsAndCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
// 创建商品分类
        $category1 = DB::table('categories')->insertGetId([
            'name' => '电子产品',
            'parent_id' => null,
        ]);

        $category2 = DB::table('categories')->insertGetId([
            'name' => '手机',
            'parent_id' => $category1,
        ]);

        $category3 = DB::table('categories')->insertGetId([
            'name' => '电脑',
            'parent_id' => $category1,
        ]);

// 创建商品
        DB::table('products')->insert([
            [
                'name' => 'iPhone 11',
                'description' => '一款优秀的智能手机，拥有出色的性能和摄影能力。',
                'price' => 5999.00,
                'image' => 'https://example.com/images/iphone-11.jpg',
                'category_id' => $category2,
            ],
            [
                'name' => 'MacBook Air',
                'description' => '一款轻薄便携的笔记本电脑，适合学生和轻度办公使用。',
                'price' => 7999.00,
                'image' => 'https://example.com/images/macbook-air.jpg',
                'category_id' => $category3,
            ],
            [
                'name' => 'iPad Pro',
                'description' => '一款强大的平板电脑，拥有高分辨率屏幕和出色的续航能力。',
                'price' => 8999.00,
                'image' => 'https://example.com/images/ipad-pro.jpg',
                'category_id' => $category2,
            ],
            [
                'name' => 'iMac',
                'description' => '一款强大的台式电脑，适合专业人士和重度办公使用。',
                'price' => 12999.00,
                'image' => 'https://example.com/images/imac.jpg',
                'category_id' => $category3,
            ],
        ]);
    }
}
