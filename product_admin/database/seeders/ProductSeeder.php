<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            '电子产品' => null,
            '手机' => 1,
            '电脑' => 1,
            '平板电脑' => 1,
            '电视' => 1,
        ];

        foreach ($categories as $name => $parent_id) {
            $category_id = DB::table('categories')
                ->insertGetId([
                    'name' => $name,
                    'parent_id' => $parent_id
                ]);
        }

        $products = [
            [
                'name' => 'iPhone 11',
                'description' => '一款优秀的智能手机,拥有出色的性能和摄影能力。',
                'price' => 5999.00,
                'image' => 'https://example.com/images/iphone-11.jpg',
                'category_id' => 2
            ],
            [
                'name' => '华为 P30 Pro',
                'description' => '华为公司旗舰手机,拥有强大的性能和初始化的摄影体验。',
                'price' => 6999.00,
                'image' => 'https://example.com/images/huawei-p30-pro.jpg',
                'category_id' => 2
            ],
            // ...
        ];

        DB::table('products')->insert($products);
    }
}
